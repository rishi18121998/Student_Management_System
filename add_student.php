<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"sms"); // sms is dbms file name
$query = "insert into students values ('',$_POST[roll_no],'$_POST[name]','$_POST[father_name]','$_POST[class]','$_POST[mobile]','$_POST[email]','$_POST[password]','$_POST[remark]')";
$query_run = mysqli_query($connection,$query);

?>
 <script type="text/javascript">
   alert("Student Added Successfully");
 </script>
 <?php
  header("Location: admin_dashboard.php");
  ?>
