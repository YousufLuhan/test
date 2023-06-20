<?php
require("connection.php");
if(isset($_POST["submit"])){
    $name = $_POST["fullname"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $gender = $_POST["gender"];
    $DoB = $_POST["DOB"];
    $groups = $_POST["groups"];
    $phonenumber = $_POST["phonenumber"];
    $studentimage = $_FILES["studentimage"];
    $imageName = $studentimage["name"];
    $imageTmp = $studentimage["tmp_name"];
    $imageError = $studentimage["error"];
    $imageSep = explode(".",$imageName);
    $imageExt = strtolower(end($imageSep));
    $extension = array("png","jpg","jpeg");

    if(in_array($imageExt,$extension)){
        $imageUpload = "images/".$imageName;
        move_uploaded_file($imageTmp,$imageUpload);

        $stmt = $connection->prepare("insert into student_details (Name,FathersName,MothersName,Gender,DoB,Section,Phone,Image) values (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss",$name,$fname,$mname,$gender,$DoB,$groups,$phonenumber,$imageUpload);
        $stmt->execute();
        $stmt->close();
    }else{
        echo "Your file extension is ".strtoupper($imageExt) ." that does not exist";
    } 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 align="center">Student List</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>FathersName</th>
                <th>MothersName</th>
                <th>Gender</th>
                <th>DoB</th>
                <th>Groups</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $connection = new mysqli("localhost","root","","student_management");
            $sql = "select * from student_details";
            $result = $connection->query($sql);
            
            while($row = $result->fetch_assoc()){
                echo "
                <tr>
                <td>$row[ID]</td>
                <td>$row[Name]</td>
                <td>$row[FathersName]</td>
                <td>$row[MothersName]</td>
                <td>$row[Gender]</td>
                <td>$row[DoB]</td>
                <td>$row[Section]</td>
                <td>$row[Phone]</td>
                <td>$row[Image]</td>
                <td>
                   <a href ='edit.php?id=$row[ID]'>Edit</a><span> <a href ='delete.php?id=$row[ID]'>Delete</a></span>
                </td>
            </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <a href="admin.php">Cancel</a>
</body>

</html>