<!DOCTYPE html>
<html>
<head>
<script  type = "text/javascript">
function preventBack(){
	window.history.forward();
}
setTimeout(preventBack,0);
//window.onunload = function(){null};

</script>
<style>
.form{
	display:flex;
	justify-content:center;
	text-align:center;
	box-shadow: 0px 2px 4px 0 black;
	width:300px;
	padding:50px;
	font-size:20px;
	border-radius:10px;
}

</style>
</head>
<body>
<div class = "form">
<div>
<h3>Please Login</h3>
<form action = "welcome.php" method = "post" >
UserName:<input type = "text" name = "name"  /><br><br>
Password:<input type = "password" name = "password" /><br><br>
<input type = "submit" name ="login" value = "login" />
</div>
</div>

</body>
</html>










