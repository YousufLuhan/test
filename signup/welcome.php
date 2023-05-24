<?php
$name = "Admin"; 
$password = "526551";


session_start();

if(isset($_SESSION["name"])){
	echo "<h1>Welcome ".$_SESSION["name"].", This is Dashboard</h1>";
	echo "<a href = 'product.php'><input type = 'button' value = 'Another Page'><br>";
	echo "<br><a href = 'logout.php'><input type= 'button' value='logout' /></a>";
}else{
	if($_POST["name"] == $name && $_POST["password"] == $password){
		$_SESSION["name"] = $name;
		echo "<script>location.href = 'welcome.php'</script>";
	}else{
		echo "<script>location.href = 'error.php'</script>";
	}
}
?>
