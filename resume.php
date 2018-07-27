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
	<title>رزومه</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
</head>

<body dir="rtl">
<div class="container"><br>
	
	<br>
<form method="post" action="upload_file.php" enctype="multipart/form-data" accept-charset="utf-8">
	<p>عنوان رزومه :</p>
	<input TYPE="text" name="title" class="form-control" />
	<br>
	<p>فایل رزومه :</p>
	<input type="file"  name="Filename" class="btn btn-info"> 
	<br>
	<p>توضیحات :</p>
	<textarea rows="10" cols="35" name="Description" class="form-control"></textarea>
	<br/>
	<input TYPE="submit" name="upload" value="ثبت رزومه" class="btn btn-success"/>
	<a href="admin-page.php" class="btn btn-primary">بازگشت</a>
	<a href="login.php?action=logout" class="btn btn-warning">خروج</a>
</form>
</div>
<script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>