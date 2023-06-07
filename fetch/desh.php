<?php
 $Name = $_POST["Name"];
 $Age = $_POST["Age"];
 $Gender = $_POST["Gender"];
 $Phone = $_POST["Mobile"];
 $Address = $_POST["Address"];

 //connection
 $conn = new mysqli("localhost","root","","university");
 //check connection
 if($conn->connect_error){
     die("Connection Failed".$conn->connect_error);
 }else{
     echo "Connect successfully <br>";
 };

//fetch data from dataTable;
$sql = "select Phone from student_details";
$result = $conn->query($sql);

//check every phone number for unique;
$resultArray = [];
while($row = $result->fetch_assoc()){
    $resultArray[] = $row;
    
}
$match_mobile = "";
$resultLen = count($resultArray);
for($i = 0; $i < $resultLen; $i++){
    if($resultArray[$i]["Phone"] ===  $Phone){
        echo $resultArray[$i]["Phone"]." ";
        break;
    }
}
if(!empty($match_mobile)){
    echo "Already have this mobile number";

}else{
    $stmt = $conn->prepare("insert into students(Name,Age,Gender,) 
        values(?,?,?)");
       

        $stmt1 = $conn->prepare("insert into student_details(Address,Phone) 
        values(?,?)");

        $stmt->bind_param("sis",$Name,$Age,$Gender);
        
        
        $stmt1->bind_param("si",$Address,$Phone);
        $stmt->execute();
        $stmt1->execute();

        echo "<h1>Registation  Success</h1>";
        // echo "
        // <script>
        // back();
        // </script>
        // ";
        $conn->close();

}
 
?>