!<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Login</title>
  </head>
  <body style="background-color: #008080;">
    <center>
      <h3>Student Login Page</h3><br>
      <form action="" method="post">
        Email: <input type="text" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" name="submit">
      </form>
      <form action="<?php if(isset($_POST['back'])){header("Location: login.php");}?>" method="post">
        <input type="submit" name="back" value="back">
      </form>
      <?php
          session_start();

          if(isset($_POST['submit'])){
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,"sms"); // sms is dbms file name
            $query = "select * from students where email = '$_POST[email]'";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run))
            {
              if($row['email'] == $_POST['email']){
                if($row['password'] == $_POST['password']){
                  $_SESSION['email'] = $row['email'];
                  $_SESSION['name'] = $row['name'];
                  header("Location: student_dashboard.php");
                }
                else {
                  echo "Wrong password";
                }
              }
              else{
                  echo "Wrong Email ID";
              }
            }

          }
          if(isset($_POST['Student_Login'])){
            header("Location: Student_login.php");
          }
       ?>
    </center>
  </body>
</html>
