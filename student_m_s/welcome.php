<?php
    require("connection.php");
    $Email = $_POST["email"];
    $Password = $_POST["password"];
    
    //connection
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "student_management";
    
    //fetch all email from database
    $sql = "select Email,Password from user";
    $result = $connection->query($sql);
    
    $totalResult = [];
    while($row = $result->fetch_assoc()){
         $totalResult[] = $row;
    }
    
    $lenTotalResult = count($totalResult);
    $isMatch = "";

    //check already have this gmail;
      session_start();
    for($i = 0; $i < $lenTotalResult; $i++){
        if($totalResult[$i]["Email"] === $Email && $totalResult[$i]["Password"] === $Password){
             $_SESSION["Email"] = $totalResult[$i]["Email"];
            $isMatch .= "matched";
           break;
        }
    }
    
    if(!empty($isMatch)){
        echo "
        <script>location.href = 'admin.php'</script>
        ";
    }else{
        echo "<script>location.href = 'error.php'</script>";
    }         


?>