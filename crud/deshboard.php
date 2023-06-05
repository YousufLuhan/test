<?php
$Name = $_POST["Name"];
$Email = $_POST["Email"];
$Gender = $_POST["Gender"];
$DoB = $_POST["DoB"];
$Phone = $_POST["Mobile"];
$Address = $_POST["Address"];


//connection
 $conn = new mysqli("localhost","root","","storehouse");
 if($conn->connect_error){
     die("Connection faild".$conn->connect_error);
 }else
 {
// Prepare and execute the query
 $query = "SELECT Phone,Email FROM clients";
 $result = $conn->query($query);

// // Fetch data as an array
 $resultArray = [];
 while ($row = $result->fetch_assoc()) {
     $resultArray[] = $row;
}



 $resultLen = count($resultArray);
      $match_mobile = '';
       $match_email = '';

//       //checked already have number or email;
    for($i = 0;$i < $resultLen; $i++){
      //echo empty($match_email);
      if($resultArray[$i]["Phone"] == $Phone && $resultArray[$i]["Email"] == $Email){
      $match_mobile.=$resultArray[$i]["Phone"];
            $match_email .= $resultArray[$i]["Email"];
            break;
        }

        if($resultArray[$i]["Phone"] == $Phone ){
            $match_mobile.=$resultArray[$i]["Phone"];
             break;
        }  
      if($resultArray[$i]["Email"] == $Email){
             $match_email .= $resultArray[$i]["Email"];
             break;
        }
     } 
    }
    
//     //function
    echo "
        <script>
        function back(){
            setTimeout(()=>{
                location.href = 'form.php';
            },3000);
        } 
        </script>";
   



     if(!empty($match_mobile)&& !empty($match_email) ){
        echo "<h1>Both Phone and Email already taken!</h1>";
        // echo "
        // <script>
        // back();
        // </script>
        // ";
        
        

     }
    elseif(!empty($match_mobile)){
        echo "<h1>Already have this mobile number!</h1>";
        // echo "
        // <script>
        // back();
        // </script>
        // ";

    }elseif(!empty($match_email)){
        echo "<h1>Already have this email!</h1>";
        // echo "
        // <script>
        // back();
        // </script>
        // ";

    }
    else{
        $stmt = $conn->prepare("insert into clients(Name,Email,Gender,Birth,Phone,Address) 
        values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssis",$Name,$Email,$Gender,$DoB,$Phone,$Address);
        $stmt->execute();
        echo "<h1>Registation  Success</h1>";
        // echo "
        // <script>
        // back();
        // </script>
        // ";
        $conn->close();

    
};

?>