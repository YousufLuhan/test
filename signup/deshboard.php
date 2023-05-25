<?php

session_start();
echo "<h1>Welcome ".$_SESSION["name"].",This is Dashboard</h1>";
	echo "<a href = 'product.php'><input type = 'button' value = 'Another Page'><br>";
	echo "<br><a href = 'logout.php'><input type= 'button' value='logout' /></a>";	



?>
<script  type = "text/javascript">
function preventBack(){
	window.history.forward();
}
setTimeout(preventBack,0);
window.onunload = function(){null};
</script>