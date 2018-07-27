<?php include "mysqliconnection.php"; ?>
<?php  

$id=$_GET["id"];
if (isset($_POST['send'])){
	global $conn;
	$cm_name = $_POST['cm_name'];
	$cm_body = $_POST['cm_body'];
	$result = $conn->query("INSERT INTO comment (comment_name,comment_body,post_ID) VALUES ('$cm_name','$cm_body','$id')");
}

$result = $conn->query("SELECT * from post WHERE post_ID=".$id);
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
	while ($row = $result->fetch_assoc()) {
		echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
		echo "<h1>";
		echo $row['post_title'];
		echo "</h1>";
		echo '<iframe class="img-thumbnail col-lg-12 col-md-12 col-sm-12 col-xs-12" id="iframepdf" style="height:700px;" src="http://localhost/proje/'.$row['filepath'].'"></iframe>';
		echo "<div class='alert alert-success col-lg-12 col-md-12 col-sm-12 col-xs-12' style='margin-top:10px'>";
		echo $row['description'];
		echo "</div>";
		echo "</div>";

	}
	?>
	
	<?php
	$result = $conn->query("SELECT * from comment WHERE post_ID=".$id);
	while ($row = $result->fetch_assoc()) {
		echo "<br><br><br><br><br><h2>";
		echo $row['comment_name'];
		echo "</h2>";
		echo "<div>";
		echo $row['comment_body'];
		echo "</div>";
	}
	?>
	
	<form method="post">
	<br><br><br>
		<p>نام : </p>
		<input type="text" name="cm_name" class="form-control text-right" >
		<br>
		<p>متن نظر : </p>
		<textarea rows="10" class="form-control" cols="35" name="cm_body"></textarea><br>
		<div>
		<input type="submit" value="ثبت نظر" class="btn btn-success" name="send"/>
		<a href="index.php" class="btn btn-default" style="margin:10px,0,0,0">صفحه اصلی</a>
		</div>
	</form>
<br>
</div>

<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
<h1>
		<?echo $row['post_title'];?>
</h1>
<iframe class="img-thumbnail col-lg-12 col-md-12 col-sm-12 col-xs-12" id="iframepdf" style="height:700px;" src="http://localhost/proje/'.$row['filepath'].'"></iframe>
<div class='alert alert-success col-lg-12 col-md-12 col-sm-12 col-xs-12' style='margin-top:10px'>
		<? echo $row['description'];?>
</div>
</div>


	<script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>