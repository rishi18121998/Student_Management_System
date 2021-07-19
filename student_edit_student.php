<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"sms"); // sms is dbms file name
$query = "update students set name ='$_POST[name]' , father_name ='$_POST[father_name]', mobile ='$_POST[mobile]' ,email ='$_POST[email]',remark ='$_POST[remark]' where roll_no = $_POST[roll_no]";
$query_run = mysqli_query($connection,$query);

?>
 <?php
  header("Location: student_dashboard.php");
  ?>
