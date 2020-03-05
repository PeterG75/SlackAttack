<?php  session_start();

include 'config.php';
if(isset($_POST['submit'])){
  $submittedUser = $_POST['username'];
  $submittedPass = $_POST['password'];
  if($submittedUser==$username && $submittedPass == $password) {
      $_SESSION['role'] ='admin';
      echo "<script> location.href='index.php'; </script>";
        exit;
    }
    else {
      echo "<script> location.href='login.php'; </script>";
      exit;
    }
}
?>
<html>
<body>
<center>
<br>
<br>
<form action="" method="POST">
<input type="text" name="username" placeholder="Username" style="width:10%;height:40;" /><br />
<br><input type="password" name="password" placeholder="Password" style="width:10%;height:40;" /><br />
<br>
<input type="submit" value="Login" name="submit" style="width:10%;height:40;" />
</form>
</center>
</body>
</html>