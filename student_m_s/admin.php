<?php
session_start();
if(isset($_SESSION["Email"])){
  echo '
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
    *{
        margin:0;
        padding:0;
        background-color:rgb(255, 255, 255);
    }
    .div1{
        display: flex;
        justify-content: center;
        align-items: center;
        height:100vh;     
    }
    .elements{
      
        text-align:center;
    }
    h1{
        text-align:center;
    }
    a{
        font-size:20px;
        color: rgb(4, 170, 109);
        padding:3px;
    }
    #logout{
        color:rgb(245, 98, 87);
    }
    </style>
</head>
<body>
<div class="div1">
<div class="elements">
    <h1>Welcome Admin</h1>
    <a href = "form.php">StudentForm<a/>
    <a href = "list.php">StudentList<a/>
    <a href = "search.php">Payment<a/>
    <a href = "today.php">Report<a/>
    <a href = "logout.php" id = "logout">Logout<a/>
    </div>
    </div>
</body>
</html>
  ';
}else{
    echo "<script>location.href = 'login.php'</script>";
}
?>