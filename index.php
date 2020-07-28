<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه داشبورد</title>
<link rel="stylesheet" href="css/index.style.css" />
</head>
<body dir="rtl">
	<div class="form">
		<p>خوش آمدید <?php echo $_SESSION['username']; ?>!</p>
		<p>This is secure area.</p>
		<a href="logout.php">خروج</a>
	</div>
<?php
$con = mysqli_connect("localhost","root","","register","3308");

// Check connection
if (!$con){
     die("به دلیل مشکل زیر، اتصال برقرار نشد : <br />" . mysql_error());
}
$query = "SELECT * FROM `users`";

$result = mysqli_query($con,$query) ;

echo "<table class='TFtable'>
	<thead>
	<tr>
	<th>شماره</th>
	<th>نام و نام خانوادگی</th>
	<th>ایمیل</th>
	</tr>
	</thead>";

while($row = mysqli_fetch_array($result)){
     echo "<tr>";
     echo "<td>" . $row['id'] . "</td>";
     echo "<td>" . $row['username'] . "</td>";
	 echo "<td>" . $row['email'] . "</td>";
     echo "</tr>";
}
echo "</table class='TFtable'>";

mysqli_close($con);
?>
	
</body>
</html>
