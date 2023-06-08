<?php
 $Name = $_POST["Name"];
 $Age = $_POST["Age"];
 $Gender = $_POST["Gender"];
 $Phone = $_POST["Phone"];
 $Address = $_POST["Address"];


 //connection
 $conn = new mysqli("localhost","root","","university");
 //check connection
 if($conn->connect_error){
     die("Connection Failed".$conn->connect_error);
 }else{
     echo "Connect successfully <br>";
 };

//insert data 1st table;
 $stmt = $conn->prepare("insert into students(Name,Age,Gender) values(?,?,?)");
 $stmt->bind_param("sis",$Name,$Age,$Gender);
 $stmt->execute();
 $StudentID = $stmt->insert_id;
 

 //insert data relational  table;
  $stmt1 = $conn->prepare("insert into student_details(Address,Phone,StudentID) values(?,?,?)");
  $stmt1->bind_param("sis",$Address,$Phone,$StudentID);
  $stmt1->execute();
  
  //success message;
  echo "<h1>Registation  Success</h1>";

  //close all connection;
  $stmt->close();
  $stmt1->close();
  $conn->close();

















//fetch data from dataTable;
// $sql = "select Phone from student_details";
// $result = $conn->query($sql);

        
        
        // $stmt1 = $conn->prepare("insert into student_details(Address,Phone) 
        // values(?,?)");
        // $stmt1->bind_param("si",$Address,$Phone);
        // $stmt1->execute();

 
        // echo "
        // <script>
        // back();
        // </script>
        // ";
      




//check every phone number for unique;
// $resultArray = [];
// while($row = $result->fetch_assoc()){
//     $resultArray[] = $row;
    
// }
// $match_mobile = "";
// $resultLen = count($resultArray);
// for($i = 0; $i < $resultLen; $i++){
//     if($resultArray[$i]["Phone"] ===  $Phone){
//         echo $resultArray[$i]["Phone"]." ";
//         break;
//     }
// }
// if(!empty($match_mobile)){
//     echo "Already have this mobile number";

// }else{
   

// }
 
?>