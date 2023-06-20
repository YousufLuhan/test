<?php
require("connection.php");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $payment = $_POST['amount'];
    $total = $_POST['total'];
    session_start();
    $received = $_SESSION["Email"];
  

    $stmt = $connection->prepare("insert into payment(Name,Amount,Purpose,Receiver) values(?,?,?,?)");
    $stmt->bind_param("ssss",$name,$payment,$total,$received);
    $stmt->execute();
    echo $name . " your payment successfully";
    $stmt->close();
}else{
    // header("location:payment.php");
    // exit();
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
    <a href="admin.php">Admin</a>
    <h1 align="center">Payment List</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Purpose</th>
                <th>Date</th>
                <th>Receiver</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from payment";
            $result = $connection->query($sql);
            while($row = $result->fetch_assoc()){
                echo "
                <tr>
                <td>$row[ID]</td>
                <td>$row[Name]</td>
                <td>$row[Amount]</td>
                <td>$row[Purpose]</td>
                <td>$row[Date]</td>
                <td>$row[Receiver]</td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>

</html>