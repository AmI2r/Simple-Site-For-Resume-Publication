<?php include "mysqliconnection.php"; ?>
<?php session_start();?>
<?php
if(!isset( $_SESSION["admin"])){
  header('location: login.php');
  exit();
}

if (isset($_POST["changepass"]))
{
  change();
		
}


function change() {
  global $conn;
  $pass = $_POST['password'];
  $result = $conn->query("UPDATE usersystem SET password='$pass' WHERE username='$_SESSION[admin]'") or die("Error : ".mysqli_error($conn));
  if($_POST['password2']!=$_POST['password'])
  {
  	echo'<script language="javascript" type="text/javascript"> 
                alert("Password is not Correctly replicated");
                window.location = "change password.php";
        </script>';  
   }
  else
  {
  if($result){

	echo'<script language="javascript" type="text/javascript"> 
                alert("Password Successfully Changed!");
                window.location = "admin-page.php";
        </script>';
   
    exit();
  }else{
   echo '<script language="javascript" type="text/javascript"> ;
   alert("There Is Probem With Changing Password")
   window.location = "change password.php";
    </script>';

 }
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>پروفایل ادمین</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
</head>
<body dir="rtl">
	<div class="container"><br>
    <form method="post"><br>
      <div dir="ltr">
        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <input type="text" class="form-control text-right" name="password" placeholder="نام کاربری" aria-describedby="basic-addon1">
          <span class="input-group-addon" id="basic-addon2"> : رمز عبور</span>
        </div><br>
        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12" dir="ltr">
          <input type="password" class="form-control text-right" name="password2" placeholder="رمز عبور" aria-describedby="basic-addon1">
          <span class="input-group-addon" id="basic-addon2"> : تکرار رمز عبور</span>
        </div><br>
      </div>
      <button type="submit" class="btn btn-success" name="changepass">تغییر رمز </button>
      <a href="admin-page.php" class="btn btn-primary" style="margin:10px,0,0,0">بازگشت</a>
    </form>
	
		</span> 
	</div>
	<script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>