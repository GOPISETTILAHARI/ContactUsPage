<?php
if(isset($_REQUEST['register'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $reg=$_POST['reg'];
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $address=$_POST['address'];
  $link = new mysqli("localhost:3307", "root", "","register");
  if (!$link) {
    die("Connection failed" );
  }
  $sql = "SELECT * FROM `details` where `email`= '$email' ";
  $res = mysqli_query($link,$sql);
  $rows = mysqli_num_rows($res);
  if($rows>0){
    echo "Existing user!!!!";
  }else{
    $sql2 = "INSERT INTO `details` (`fname`, `lname`, `reg`,`dob`,`gender`,`email`,`pass`,`address`,`id`)
            VALUES ('$fname','$lname', '$reg','$dob','$gender','$email','$pass','$address',NULL)";
    $r=mysqli_query($link,$sql2);
    header('location:login.php');
  }
  mysqli_close($link);
}
?>
<html>
<body>
  <form action="" method="post">
  <label for="fname">First Name:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Last Name:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="reg">Reg No:</label>
  <input type="text" id="reg" name="reg"><br><br>
  <label for="dob">Date of Birth:</label>
  <input type="date" id="dob" name="dob"><br><br>
  <label for="gender">Gender:</label>
  <select id="gender" name="gender">
    <option value="m">Male</option>
    <option value="f">Female</option>
    <option value="o">Others</option>
  </select><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="pass">Password:</label>
  <input type="password" id="pass" name="pass"><br><br>
  
  <label for="address">Address</label><br>
  <textarea id="address" name="address" rows="5" cols="30"></textarea><br>
  
  <input type="submit" name="register" value="Register">

</form>
  
</body>
</html>
