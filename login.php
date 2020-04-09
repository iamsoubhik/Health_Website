<?php 

require('base-class.php');

$message = "";

if (isset($_POST['submit'])) {
	$saveStatus = $_POST['save'];
	if(!isset($_POST['email']))
		$message='Email is required.';
	else if(!isset($_POST['password']))
		$message='Password is required.';
	else {
		$login = $phpforlogin->doLogin($_POST['email'], $_POST['password'], $saveStatus);
		if ($login!="" && $login['status']) {
			header('location:user-panel.php');
			exit;
		} else {
			$message = $login['msg'];
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	 <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	 
    <link href="css/main.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="container">
	<div class="loginsection">
	<h2>Login</h2> 

	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
		<table border="0"> 
			<tr><td><input class="form-control"  type="email" name="email" placeholder="Email" maxlength="50"></td></tr> 
			<tr><td><input class="form-control"  type="password" name="password" placeholder="Password" maxlength="50"></td></tr> 
			<tr><td><input type="checkbox" id="save" name="save"><label for="save"> Remember you login</label></td></tr> 
			<tr><td colspan="2" align="left"> 
				<?php 
				if ($message!='')
					echo '<span style="color:red">'.$message.'</span><br>'; 
				?>
				<input style="color:red"  class="btn btn-lg btn-secondary btn-block" type="submit" name="submit" style="float:right" value="Login"> 
			</td></tr> 
		</table> 
	</form> 
	</div>
</div>
 <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>
</body>
</html>
