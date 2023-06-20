<?php
require("connection.php");
$new = null;
if(isset($_POST['change'])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "select * from  user";
    $result = $connection->query($sql);
    $isMatch = null;
    $new = null;
    $id = null;
    while($row = $result->fetch_assoc()){
        if($row["Email"] ==$email && $row['Password'] == $password){
            $id =  $row["UserID"];
            $isMatch = true;
            break;

        }
    }

    if(!empty($isMatch)){
       $newId = $_POST['new'];
       $sql = "UPDATE user SET Password = '$newId' where UserID = $id";
       $result = $connection->query($sql);
       $new ="Change Success" ;
    }else{
        $new = "Incorrect email or password!";
}

}


?>


<!DOCTYPE html>
<html lang="en">
<style>
* {
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: rgb(45, 51, 58);
}

.elements {
    height: 70vh;
    width: 350px;
    background-color: rgb(255, 255, 255);
    padding: 30px;
    box-shadow: 0 4px 6px 0;
    border-radius: 10px;
    text-align: center;
}

h1 {
    text-align: center;
    margin-bottom: 5px;
}

input {
    width: 80%;
    padding: 10px;
    font-size: 20px;
    margin: 5px;


}

#btn {
    border-radius: 30px;
    cursor: pointer;
    background-color: rgb(4, 170, 109);
    text-align: center;
}

label {
    font-size: 20px;
}

.div1 {
    display: flex;
    justify-content: space-around;
}

#sign {
    background: none;
    border: none;
    padding: 2px;
    cursor: pointer;
    font-size: 20px;
    color: rgb(4, 170, 109);
}

p {
    background-color: cadetblue;
    padding-bottom: 2px;
    margin-top: -15px;
    /* display: none; */
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>
    <div class="container">
        <div class="elements">
            <h1>Change Password</h1>
            <form action="" method="post">
                <p align='right' style="background-color: white; font-size: 20px;">
                    <a style="color: green;" href="login.php">Log in</a>
                </p>
                <input type="email" placeholder="Enter old your Email" name="email" required><br><br>
                <input type="password" placeholder="Enter your old Password" name="password" required><br><br>
                <input type="password" placeholder="Enter new your Password" name="new" required><br><br>
                <p style="background-color: white;"><?php echo $new?></p>
                <input type="submit" value="Changed" id="btn" name="change">
            </form>
        </div>
    </div>
</body>

</html>