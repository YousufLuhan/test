<?php
require("connection.php");
if($_SERVER["REQUEST_METHOD"]==="GET"){
    $id = $_GET["id"];
    $sql = "select * from payment where ID = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $amount = $row["Amount"];
    $purpose = $row["Purpose"];
}else{
    if($_SERVER["REQUEST_METHOD"] ==="POST"){
        $id = $_GET["id"];
        $amount = $_POST["amount"];
        $purpose = $_POST["total"];

        $sql = "update payment set Amount = '$amount', Purpose = '$purpose' where ID = $id";
        $connection->query($sql);

        header("location:report.php");
        exit();
    }else{
        header("location:report.php");
        exit();

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
    <form action="" method="post">
        Amount:<input type="number" placeholder="$" name="amount" required value="<?php echo $amount?>"><br><br>
        <label for="department">Purpose:</label>
        <select name="total" id="department">
            <option value="registration_charge" <?php
            if($purpose == "registration_charge"){
                echo "selected";
            }
            ?>>Registration_charge</option>
            <option value="session_charge" <?php
            if($purpose == "session_charge"){
                echo "selected";
            }
            ?>>Session_charge</option>
            <option value="tution_fee" <?php
            if($purpose == "tution_fee"){
                echo "selected";
            }
            ?>>Tution_fee</option>
        </select>
        <input type="submit" value="Update">
    </form>

</body>

</html>