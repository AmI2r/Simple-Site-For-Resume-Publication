<?php include "mysqliconnection.php"; ?>
<?php session_start();?>
<?php
if(!isset( $_SESSION["admin"])){
	header('location: login.php');
	exit();
}
?>


	<?php
	$fileExistsFlag = 0; 
	$fileName = $_FILES['Filename']['name'];
/* 
*	Checking whether the file already exists in the destination folder 
*/
global $conn,$fileName;
$result = $conn->query("SELECT filename FROM post WHERE filename='$fileName'") or die("Error : ".mysqli_error($conn));
while($row = mysqli_fetch_array($result)) {
	if($row['filename'] == $fileName) {
		$fileExistsFlag = 1;
	}		
}
/*
* 	If file is not present in the destination folder
*/
if($fileExistsFlag == 0) { 
	$target = "files/";		
	$fileTarget = $target.$fileName;	
	$tempFileName = $_FILES["Filename"]["tmp_name"];
	$fileDescription = $_POST['Description'];
	$titleResume = $_POST['title'];
	$result = move_uploaded_file($tempFileName,$fileTarget);
/*
*	If file was successfully uploaded in the destination folder
*/
if($result) { 
	   echo '<script language="javascript" type="text/javascript"> ;
   alert("resume uploaded successfully!")
   window.location = "admin-page.php";
    </script>';
	$conn->set_charset("utf8");		
	$conn->query("INSERT INTO post(filepath,filename,description,post_title) VALUES ('$fileTarget','$fileName','$fileDescription','$titleResume')") or die("Error : ".mysqli_error($conn));			
}
else {			
		   echo '<script language="javascript" type="text/javascript"> ;
   alert("an error occurred when uploading resume")
   window.location = "admin-page.php";
    </script>';	
}
mysqli_close($conn);
}
/*
* 	If file is already present in the destination folder
*/
else {
			   echo '<script language="javascript" type="text/javascript"> ;
   alert("This resume was uploaded plase Try an other resume")
   window.location = "admin-page.php";
	mysqli_close($conn); </script>';
	
}

?>

<title></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
</head>
<body dir="rtl">
	<h1><a href="resume.php" title="بازگشت">بازگشت</a></h1>

	<script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
