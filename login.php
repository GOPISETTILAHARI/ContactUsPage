<?php
if(isset($_REQUEST['sub'])){
  session_start();
  $_SESSION['Mail']=$_POST['email'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $link = new mysqli("localhost:3307", "root", "","register");
  if (!$link) {
    die("Connection failed" );
  }
  $sql = "SELECT * FROM `details` where `email`= '$email' and `pass`='$pass' ";
  $res = mysqli_query($link,$sql);
  $rows = mysqli_num_rows($res);
  if($rows>0){
    header('location:./welcome.php');
  }else{
    echo "Invalid Login";
  }
  mysqli_close($link);
}
?>
<html>
<body>
  <form action="" method="post" >
  
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="pass">Password:</label>
  <input type="password" id="pass" name="pass"><br><br>
  
  
  
  <input type="submit" name="sub" value="Login">

</form>
  
</body>
</html>