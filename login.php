<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="login site">
<title>ورود کاربران</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="css/login.style.css"/>
</head>
<body dir="rtl">
	<?php
	require('db.php');
	session_start();
	// If form submitted, insert values into the database.
	if (isset($_POST['username'])){
			// removes backslashes
		$username = stripslashes($_REQUEST['username']);
			//escapes special characters in a string
		$username = mysqli_real_escape_string($con,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		//Checking is user existing in the database or not
			$query = "SELECT * FROM `users` WHERE username='$username'
	and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
			if($rows==1){
			$_SESSION['username'] = $username;
				// Redirect user to index.php
			header("Location: index.php");
			 }else{
		echo "<div class='divposition'>
		<div class='form'>
	<h3>نام کاربری یا رمز عبور شما اشتباه است</h3>
	<br/>برای ورود روی <a href='login.php'>اینجا</a> کلیک کنید</div>
	</div>";
		}
		}else{
	?>
	<center>
	<div class="divposition">
	<div class="form">
		<h3>ورود</h3>
		<form action="" method="post" name="login">
		<div>
<span id="greetngs">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
</span>
 <input type="text" name="username"  placeholder="نام کاربری" required />
 </div>
 <br>
 <div>
 <span id="greetngs">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
</span>
			<input type="password" name="password" placeholder="رمز عبور" required />
			</div>
			<input type="submit" name="submit" value="ورود" />
		</form>
		<p style="font-size: 12px;">عضو نیستید ؟
		<a href='registration.php'>هم اکنون ثبت نام کنید</a></p>
	</div>
	</div>
	</center>
	<?php } ?>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
