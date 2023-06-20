<?php
require("connection.php");
//received data with post method
$Name = $_POST["name"];
$Email = $_POST["email"];
$Password = $_POST["password"];

//fetch all email from database
$sql = "select Email from user";
$result = $connection->query($sql);

$totalEmail = [];
while($row = $result->fetch_assoc()){
     $totalEmail[] = $row;

}

$lenTotalEmail = count($totalEmail);
$matchEmail = "";

//check already have this gmail;
for($i = 0; $i < $lenTotalEmail; $i++){
    if($totalEmail[$i]["Email"] === $Email){
        $matchEmail .=  $Email;
        break;
    }
}

if(!empty($matchEmail)){
    echo "<h1 style = 'text-align:center;background-color: #ffffcc; border-left: 6px solid #ffeb3b;'>Already have this email!</h1>";

}else{
    //insert data into database
    $stmt = $connection->prepare("insert into user(Name,Email,Password) values(?,?,?)");
    $stmt->bind_param("sss",$Name,$Email,$Password);
    $stmt->execute();
    echo "<h1 style = 'text-align:center; background-color: #ddffdd;border-left: 6px solid #04AA6D;'>Registration success</h1>";

    //redirect to log in after 2 seconds;
    echo " 
    <script>
    setTimeout(()=>{
        location.href = 'login.php';
    },2000);
    </script>
";
    //close connection
    $stmt->close();
    $connection->close();
}
?>