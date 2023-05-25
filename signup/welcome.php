<?php

$name = "Admin"; 
$password = "526551";
	
	
session_start();

     if(isset($_SESSION["name"]) && isset($_SESSION["block"])){
		 header("Location:http://localhost/PHP-program/signup/deshboard.php",true,301);
		 exit();
	
}else{
		if($_POST["name"] == $name && $_POST["password"] == $password){
		$_SESSION["name"] = $name;
		$_SESSION["block"] = true;
		header("Location:http://localhost/PHP-program/signup/welcome.php");
         exit();
	}else{
		echo "<script>location.href = 'error.php'</script>";
	}

	
}


    


?>
