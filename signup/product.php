<?php
session_start();

if(isset($_SESSION["name"])){
	echo "<h1>Hellow welcome to product page</h1>";
	echo "<br> <a href = 'welcome.php'><input type='button' value='Back'></a>";
}else{
	echo "<script>location.href = 'signup.php'</script>";
}


?>