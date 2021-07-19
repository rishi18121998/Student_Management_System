<script type="text/javascript">
  alert("Student Added Successfully");
</script>
<?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,"sms"); // sms is dbms file name
  $query = "delete from students where roll_no = '$_POST[roll_no]'";
  $query_run = mysqli_query($connection,$query);
  ?>

   <?php
    header("Location: admin_dashboard.php");
    ?>
