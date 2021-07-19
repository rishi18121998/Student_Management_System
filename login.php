!<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  </head>
  <body style="background-color: #2E8B57;">
    <center>
      <h2>Student Management System</h2><br>
      <form action="" method="post">
        <input type="submit" name="Admin_Login" value = "Admin Login">
        <input type="submit" name="Student_Login" value = "Student Login">
      </form>
      <?php
          if(isset($_POST['Admin_Login'])){
            header("Location: admin_login.php");
          }
          if(isset($_POST['Student_Login'])){
            header("Location: Student_login.php");
          }
       ?>
    </center>
  </body>
</html>
