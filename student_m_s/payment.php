<?php
require("connection.php");
if($_SERVER["REQUEST_METHOD"]=== "GET"){
     if(!isset($_GET["id"])){
        header("location:signup.php");
        exit();
     }
     $id = $_GET["id"];
    $sql = "SELECT * FROM student_details WHERE ID = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $id = $row["ID"];
    $image = $row["Image"];
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
    <form action="report.php" method="post" align="center">
        <p><img style='width:300px;height:300px' src="<?php echo $image?>"></p>
        ID:<input type="text" name="id" value="<?php echo $id?>"><br><br>
        Amount:<input type="number" placeholder="$" name="amount" required><br><br>
        <label for="department">Purpose:</label>
        <select name="total" id="department">
            <option value="registration_charge">Registration_charge</option>
            <option value="session_charge">Session_charge</option>
            <option value="tution_fee">Tution_fee</option>
        </select>
        <input type="submit" name="submit">
    </form>
    <p align="center"><a href="admin.php">Cancel</a></p>
</body>

</html>