<?php
require("connection.php");
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $payment = $_POST['amount'];
    $total = $_POST['total'];
    session_start();
    $received = $_SESSION["Email"];
  

    $stmt = $connection->prepare("insert into payment(Amount,Purpose,Receiver,StudentID) values(?,?,?,?)");
    $stmt->bind_param("issi",$payment,$total,$received,$id);
    $stmt->execute();
    echo "Your payment successfully updated";
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
    <title>Payment List</title>
</head>

<body>
    <a href="admin.php">Admin</a><br>
    <a href="search.php">Search</a>
    <h1 align="center">Payment List</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Purpose</th>
                <th>Date</th>
                <th>Receiver</th>
                <th>StudentID</th>
                <th>Action</th>
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
                <td>$row[Amount]</td>
                <td>$row[Purpose]</td>
                <td>$row[Date]</td>
                <td>$row[Receiver]</td>
                <td>$row[StudentID]</td>
                <td>
                <a href = 'pedit.php?id=$row[ID]'>Edit</a>
                <a href = 'pdelete.php?id=$row[ID]'>Delete</a>
                </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>

</html>