<?php include "mysqliconnection.php"; ?>
<?php
session_start();
if (isset($_POST["login"]))
{
  login();
}elseif(isset( $_GET["action"]) and $_GET["action"] == "logout"){
  logout();
}elseif(isset( $_SESSION["admin"])){
  header('location: admin-page.php');
  exit();
}


function login() {
  global $conn;
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $result = $conn->query("SELECT * FROM usersystem WHERE username = '$user' AND password = '$pass' AND isAdmin='1'");
  if($result->num_rows){
    $_SESSION["admin"] = $user;
    header('location: admin-page.php');
    exit();
  }
  else{
      echo '<script language="javascript" type="text/javascript"> ;
   alert("Incorect username or password.")
   window.location = "change password.php";
    </script>';
 }
}
function logout() {
  $_SESSION = array();
  session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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
          <input type="text" class="form-control text-right" name="username" placeholder="نام کاربری" aria-describedby="basic-addon1">
          <span class="input-group-addon" id="basic-addon2"> : نام کاربری</span>
        </div><br>
        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12" dir="ltr">
          <input type="password" class="form-control text-right" name="password" placeholder="رمز عبور" aria-describedby="basic-addon1">
          <span class="input-group-addon" id="basic-addon2"> : رمز عبور</span>
        </div><br>
      </div>
      <button type="submit" class="btn btn-primary" name="login">ورود</button>
      <a href="index.php" class="btn btn-default">صفحه اصلی</a>
    </form>
  </div>
  <script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
