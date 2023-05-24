<?php
session_start();

if(isset($_SESSION["name"])){
	session_unset();
	session_destroy();
	echo "<script>location.href = 'signup.php'</script>";
}else{
	echo "<script>location.href = 'signup.php'</script>";
}

?>