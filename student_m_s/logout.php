<?php
session_start();
if(isset($_SESSION["Email"])){
    session_unset();
    echo "<script>location.href = 'login.php'</script>";  
}else{
    echo "<script>location.href = 'login.php'</script>";
}

?>