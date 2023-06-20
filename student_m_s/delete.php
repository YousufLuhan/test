<?php
require("connection.php");
 if(isset($_GET["id"])){
    $id = $_GET["id"];
    echo $id;

    $sql = "DELETE FROM student_details WHERE ID = $id";
    $connection->query($sql);
}

header("location:list.php");
exit();

?>