<?php include "mysqliconnection.php"; ?>
<?php session_start();?>
<?php
if(!isset( $_SESSION["admin"])){
  header('location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>صفحه ادمین</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
</head>
<body dir="rtl">
	<div class="container"><br>
		<a href="login.php?action=logout" class="btn btn-warning" style="font-size:22px;"><span class="glyphicon glyphicon-log-out"></span> خروج </a>
		<a href="resume.php" class="btn btn-primary" title="بارگذاری رزومه" style="font-size:22px;"><span class="glyphicon glyphicon-upload
"></span> بارگذاری رزومه</a>
		<a href="Doc.rar" class="btn btn-success" title="دریافت مستنددات وب سایت" style="font-size:22px;"><span class="glyphicon glyphicon-download
"></span> دریافت مستندات وب سایت</a>
		<a href="change password.php" class="btn btn-success" title="تغییر رمز" style="font-size:22px;"><span class="glyphicon glyphicon-lock
"></span> تغییر رمز</a>
	</div>
	<script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>


