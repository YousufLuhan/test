<?php
require("connection.php");
 if(isset($_GET["id"])){
    $id = $_GET["id"];
    // echo $id;

    $sql = "DELETE FROM payment WHERE ID = $id";
    $connection->query($sql);

}

header("location:report.php");
exit();

?>