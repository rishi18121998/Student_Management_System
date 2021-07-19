<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>

    <style>

    #header{
      height: 10%;
      width:100%;
      top: 2%;
      background-color: #008B8B;
      position: fixed;
      color: white;
    }
    #left_side{
      height: 75%
      width:15%;
      top:20%;
      position:fixed;
    }
    #right_side{
      height: 75%;
      width: 80%;
      top: 17%;
      border-color: red;
      border-radius: 5%;
      background-color: #FFEBCD;
      position: fixed;
      left: 17%;
    }
    #top_span{
      top: 13%;
      width: 80%;
      left: 17%;
      position: fixed;
    }
    #td{
      border: solid 1px black;
      padding-left: 2px;
      text-align: left;
      width:180px;
    }

    </style>


    <?php
        session_start();
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"sms");
     ?>
  </head>
  <body>
    <div id="header">
      <center>
        Student Management System &nbsp;&nbsp;&nbsp;&nbsp;<br><br>
        Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp; Name: &nbsp;<?php echo $_SESSION['name'];?>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="logout.php">Log out</a>
      </center>
    </div>
    <span id = "top_span"><marquee>Welcome!!&nbsp;&nbsp;<?php echo $_SESSION['name'];?> </marquee></span>
    <div id="left_side"><br><br><br><br><br><br><br>
        <form action="" method="post">
          <table>
            <tr>
              <td>
                <input type="submit" name="show_detail" value="Show Details" >
              </td>
            </tr>
            <tr>
              <td>
                <input type="submit" name="edit_detail" value="Edit Details" >
              </td>
            </tr>
          </table>
        </form>
    </div>
    <div id="right_side"><br><br>
      <div id="demo">
        <?php
            if(isset($_POST['show_detail']))
            {
                $query = "select * from students where email = '$_SESSION[email]'";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run))
                {
                  ?>
                      <center>
                        <table>
                          <tr>
                            <td>Roll No.: </td>
                            <td><input type="text" value="<?php echo $row['roll_no']?>" disabled> </td>
                          </tr>
                          <tr>
                            <td>Name: </td>
                            <td><input type="text" value="<?php echo $row['name']?>" disabled> </td>
                          </tr>
                          <tr>
                            <td>Father Name: </td>
                            <td><input type="text" value="<?php echo $row['father_name']?>" disabled> </td>
                          </tr>
                          <tr>
                            <td>Class: </td>
                            <td><input type="text" value="<?php echo $row['class']?>" disabled> </td>
                          </tr>
                          <tr>
                            <td>Mobile </td>
                            <td><input type="text" value="<?php echo $row['mobile']?>" disabled> </td>
                          </tr>
                          <tr>
                            <td>Email: </td>
                            <td><input type="text" value="<?php echo $row['email']?>" disabled> </td>
                          </tr>
                          <tr>
                            <td>Password: </td>
                            <td><input type="text" value="<?php echo $row['password']?>" disabled> </td>
                          </tr>
                          <tr>
                            <td>Remark: </td>
                            <td><textarea  rows="3" cols="40" disabled><?php echo $row['remark']?></textarea> </td>
                          </tr>
                        </table>
                      </center>
                      <?php
                }
            }
         ?>
         <?php
             if(isset($_POST['edit_detail']))
             {
                 $query = "select * from students where email = '$_SESSION[email]'";
                 $query_run = mysqli_query($connection,$query);
                 while($row = mysqli_fetch_assoc($query_run))
                 {
                   ?>
                       <center>
                         <form action="student_edit_student.php" method="post">
                             <table>
                               <tr>
                                 <td>Roll No.: </td>
                                 <td><input type="text" name="roll_no" value="<?php echo $row['roll_no'];?>"> </td>
                               </tr>
                               <tr>
                                 <td>Name: </td>
                                 <td><input type="text" name="name" value="<?php echo $row['name'];?>"> </td>
                               </tr>
                               <tr>
                                 <td>Father Name: </td>
                                 <td><input type="text" name="father_name" value="<?php echo $row['father_name'];?>"> </td>
                               </tr>
                               <tr>
                                 <td>Class: </td>
                                 <td><input type="text" name="class" value="<?php echo $row['class'];?>"> </td>
                               </tr>
                               <tr>
                                 <td>Mobile </td>
                                 <td><input type="text" name="mobile" value="<?php echo $row['mobile'];?>"> </td>
                               </tr>
                               <tr>
                                 <td>Email: </td>
                                 <td><input type="text" name="email" value="<?php echo $row['email'];?>"> </td>
                               </tr>
                               <tr>
                                 <td>Password: </td>
                                 <td><input type="text" name="password" value="<?php echo $row['password'];?>"> </td>
                               </tr>
                               <tr>
                                 <td>Remark: </td>
                                 <td><textarea  rows="3" cols="40" name="remark"><?php echo $row['remark'];?></textarea> </td>
                               </tr>
                               <tr>
                                 <td></td>
                                 <td><input type="submit" name ="edit" value="Save"> </td>
                               </tr>
                             </table>

                         </form>
                       </center>
                       <?php
                 }
             }
          ?>
      </div>
    </div>
    </body>
</html>
