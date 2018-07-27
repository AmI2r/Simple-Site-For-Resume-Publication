<?php include "mysqliconnection.php"; ?>
<?php
  global $conn;
  $result = $conn->query("SELECT * from post ORDER BY post_ID DESC");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
</head>

<body dir="rtl">
<div class="container"><br>
<?php
while ($row = $result->fetch_assoc()) 
	{
		echo "<div class='jumbotron col-lg-12 col-md-12'>";
		echo "<h1>";
		echo '<a href="post.php?id='.$row['post_ID'].'" >';
		echo $row['post_title'];
		echo "</a>";
		echo "</h1>";
		echo "<div>";
		echo '<iframe class="img-thumbnail col-lg-8 col-md-8 col-sm-12 col-xs-12" style="height:600px;" id="iframepdf" src="http://localhost/proje/'.$row['filepath'].'"></iframe>';
		echo "</div>";
		echo "<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>";
		echo $row['description'];
		echo "</div>";
		echo "</div>";
	}
	echo '<a href="login.php" class="btn btn-info" style="margin:10px;">ورود به حساب کاربری</a>'
?>
</div>
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>