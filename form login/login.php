<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
<body>

<?php 
    if( isset($error) ) {
    echo "<script>
            alert('Username / Password yang anda masukan salah');
          </script>";
        }
?>

<div class="col-md-4 col-md-offset-4 form-login">
    <div class="outter-form-login">
     <div class="logo-login">
        <em class="glyphicon glyphicon-user"></em>
     </div>

<form action="" class="inner-login" method="post">
    <h3 class="text-center title-login">Login</h3>
    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username" required></div>

    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" required></div>
        <input type="submit" class="btn btn-block btn-custom-green" name="login" value="LOGIN"/>
</form>
            
<?php
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    $login = @$_POST['login'];
//menyeleksi data admin dengan username dan password yang sesuai
    if($login){
    if($username == "" || $password == ""){
?><script type="text/javascript">alert("Username tidak boleh kosong")</script><?php
 } else{
         $sql = mysqli_query($koneksi, "SELECT * from tbl_login where username = '$username' and password= sha1('$password')");
         $data = mysqli_fetch_array($sql);
         $cek = mysqli_num_rows($sql);
            if($cek==1){
            if($data['level'] == "Admin"){
            @$_SESSION['Admin'] = $data['id'];
                echo "<script>window.location='http://localhost/website/Backend/dashboard.php';</script>";}
 } else {
   echo "
   <script> alert('Username / Password yang anda masukan salah');</script>";}
       }
      }
    ?>
  </div>
</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
