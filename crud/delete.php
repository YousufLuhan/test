<?php


 if(isset($_GET["id"])){
    $id = $_GET["id"];
    echo $id;

   // connection
    $conn = new mysqli("localhost","root","","storehouse");

    $sql = "DELETE FROM clients WHERE ID = $id";
    $conn->query($sql);
}

header("location:index.php");
exit();

?>