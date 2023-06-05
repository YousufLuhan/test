<?php
// $Name = "";
// $Email ="";
// $Gender = "";
// $DoB = "";
// $Phone ="";
// $Address = "";


$conn = new mysqli("localhost","root","","storehouse");

if($_SERVER["REQUEST_METHOD"]=== "GET"){
     if(!isset($_GET["id"])){
        header("location:index.php");
        exit();
     }
     $id = $_GET["id"];
    $sql = "SELECT * FROM clients WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location:index.php");
        exit();
        
    }
    
    $Name = $row["Name"];
    $Email = $row["Email"];
    $Gender = $row["Gender"];
    $DoB = $row["Birth"];
    $Phone = $row["Phone"];
    $Address = $row["Address"];
}else{
    
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Gender = $_POST["Gender"];
    $DoB = $_POST["DoB"];
    $Phone = $_POST["Mobile"];
    $Address = $_POST["Address"];
    $id = $_GET["id"];

    $sql = "UPDATE clients SET Name = '$Name',Email = '$Email',Gender = '$Gender', Birth = '$DoB',Phone =' $Phone',Address = '$Address' WHERE  ID = $id";
     $result = $conn->query($sql);  
     echo "Update successfully";    
    if(!$result){
        echo "Ivalid".$conn->connect_error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <fieldset>
        <legend>
            <h1>Contract</h1>
        </legend>
        <form method="post">
            <input type="hidden" value="<?php echo $id?>">
            Name: <input type="text" name="Name" required value="<?php echo $Name?>"><br><br>
            Email: <input type="text" name="Email" required value="<?php echo $Email?>"><br><br>
            Gender: <input type="radio" name="Gender" required checked value="Male" value="<?php echo $Gender?>">Male
            <input type="radio" name="Gender" required value="Female">Female<br><br>
            DoB: <input type="text" name="DoB" required value="<?php echo $DoB?>"><br><br>
            Mobile: <input type="number" name="Mobile" required value="<?php echo $Phone?>"><br><br>
            Address: <input type="text" name="Address" required value="<?php echo $Address?>"><br><br>
            <input type="submit"><span> </span><a href="index.php" role="button">Cancel</a>


        </form>
    </fieldset>

</body>

</html>