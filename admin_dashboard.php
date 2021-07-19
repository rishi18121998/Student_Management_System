<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <style media="screen">
    #header{
      height: 10%;
      width:100%;
      top: 2%;
      background-color: #4682B4;
      position: fixed;
      color: white;
    }
    #left_side{
      height: 75%
      width:15%;
      top:10%;
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
        $db = mysqli_select_db($connection,"sms"); // sms is dbms file name

     ?>
  </head>
  <body>
      <div id="header">
        <center>
          Student Management System <br> <br>
          Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp; Name: &nbsp;<?php echo $_SESSION['name'];?>&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="logout.php">Log out</a>
        </center>
      </div>
      <span id = "top_span"><marquee>Welcome!!&nbsp;&nbsp;<?php echo $_SESSION['name'];?> sir </marquee></span>
      <div id="left_side"><br><br><br>
          <form action="" method="post">
            <table>
              <tr>
                <td>
                  <input type="submit" name="search_student" value="Search Student" >
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="edit_student" value="Edit Student" >
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="add_student" value="Add Student" >
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="delete_student" value="Delete Student" >
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="show_teachers" value="Teacher Details" >
                </td>
              </tr>
            </table>
          </form>
      </div>
      <div id="right_side"><br><br>
        <div id = "demo">
          <?php
              if(isset($_POST['search_student']))
              {
                  ?>
                  <center>

                    <form action="" method="post">
                      Enter Scholar no.: <input type="text" name="roll_no">
                      <input type="submit" name="search_by_roll_no_for_search" value="Search">
                    </form>
                  </center>
                  <?php
              }
              if(isset($_POST['search_by_roll_no_for_search']))
              {
                $query = "select * from students where roll_no = '$_POST[roll_no]'";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run))
                {
                  ?>
                  <table>
                    <tr>
                      <td>Roll No:&nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <input type="text" name="" value="<?php echo $row['roll_no'];?>" disabled>
                      </td>
                    </tr>
                    <tr>
                      <td>Name:&nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <input type="text" name="" value="<?php echo $row['name'];?>" disabled>
                      </td>
                    </tr>
                    <tr>
                      <td>Father's Name: &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <input type="text" name="" value="<?php echo $row['father_name'];?>" disabled>
                      </td>
                    </tr>
                    <tr>
                      <td>Contact no.:&nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <input type="text" name="" value="<?php echo $row['mobile'];?>" disabled>
                      </td>
                    </tr>
                    <tr>
                      <td>Email:&nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <input type="text" name="" value="<?php echo $row['email'];?>" disabled>
                      </td>
                    </tr>
                    <tr>
                      <td>Remarks:&nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <textarea rows="3" cols="40" disabled><?php echo $row['remark'];?></textarea>
                      </td>
                    </tr>
                  </table>
                  <?php
                }
              }
           ?>
           <?php
               if(isset($_POST['edit_student']))
               {
                   ?>
                   <center>

                     <form action="" method="post">
                       Enter Scholar no.: <input type="text" name="roll_no">
                       <input type="submit" name="search_by_roll_no_for_edit" value="Search">
                     </form>
                   </center>
                   <?php
               }
               if(isset($_POST['search_by_roll_no_for_edit']))
               {
                 $query = "select * from students where roll_no = '$_POST[roll_no]'";
                 $query_run = mysqli_query($connection,$query);
                 while($row = mysqli_fetch_assoc($query_run))
                 {
                   ?>
                   <form  action="admin_edit_student.php" method="post">
                     <table>
                       <tr>
                         <td>Roll No:&nbsp;&nbsp;&nbsp;</td>
                         <td>
                           <input type="text" name="roll_no" value="<?php echo $row['roll_no'];?>">
                         </td>
                       </tr>
                       <tr>
                         <td>Name:&nbsp;&nbsp;&nbsp;</td>
                         <td>
                           <input type="text" name="name" value="<?php echo $row['name'];?>" >
                         </td>
                       </tr>
                       <tr>
                         <td>Father's Name: &nbsp;&nbsp;&nbsp;</td>
                         <td>
                           <input type="text" name="father_name" value="<?php echo $row['father_name'];?>">
                         </td>
                       </tr>
                       <tr>
                         <td>Contact no.:&nbsp;&nbsp;&nbsp;</td>
                         <td>
                           <input type="text" name="mobile" value="<?php echo $row['mobile'];?>">
                         </td>
                       </tr>
                       <tr>
                         <td>Email:&nbsp;&nbsp;&nbsp;</td>
                         <td>
                           <input type="text" name="email" value="<?php echo $row['email'];?>">
                         </td>
                       </tr>
                       <tr>
                         <td>Remarks:&nbsp;&nbsp;&nbsp;</td>
                         <td>
                           <textarea rows="3" cols="40"name="remark"><?php echo $row['remark'];?></textarea>
                         </td>
                       </tr>
                       <br>
                       <tr>
                         <td></td>
                         <td><input type="submit" name="edit" value="Save"></td>
                       </tr>
                     </table>
                   </form>
                   <?php
                 }
               }
            ?>
            <?php
                if(isset($_POST['add_student']))
                {
                    ?>
                    <center>
                      <h2>Fill the details given below:<br></h2>
                        <form  action="add_student.php" method="post">
                          <table>
                            <tr>
                              <td>Roll No:&nbsp;&nbsp;&nbsp;</td>
                              <td>
                                <input type="text" name="roll_no" value="" required>
                              </td>
                            </tr>
                            <tr>
                              <td>Name:&nbsp;&nbsp;&nbsp;</td>
                              <td>
                                <input type="text" name="name" value="" >
                              </td>
                            </tr>
                            <tr>
                              <td>Father's Name: &nbsp;&nbsp;&nbsp;</td>
                              <td>
                                <input type="text" name="father_name" value="">
                              </td>
                            </tr>
                            <tr>
                              <td>Class: &nbsp;&nbsp;&nbsp;</td>
                              <td>
                                <input type="text" name="class" value="">
                              </td>
                            </tr>
                            <tr>
                              <td>Contact no.:&nbsp;&nbsp;&nbsp;</td>
                              <td>
                                <input type="text" name="mobile" value="">
                              </td>
                            </tr>
                            <tr>
                              <td>Email:&nbsp;&nbsp;&nbsp;</td>
                              <td>
                                <input type="text" name="email" value="">
                              </td>
                            </tr>
                            <tr>
                              <td>Password: &nbsp;&nbsp;&nbsp;</td>
                              <td>
                                <input type="text" name="password" value="">
                              </td>
                            </tr>
                            <tr>
                              <td>Remarks:&nbsp;&nbsp;&nbsp;</td>
                              <td>
                                <textarea rows="3" cols="40" name="remark"></textarea>
                              </td>
                            </tr>
                            <br>
                            <tr>
                              <td></td>
                              <td><input type="submit" name="add" value="Add Student"></td>
                            </tr>
                          </table>
                        </form>
                    </center>
                    <?php
                }
                ?>
                <?php
                if(isset($_POST['delete_student']))
                {
                    ?>
                      <center>
                        <h3>Enter Scholar no. to delete that student</h3>
                        <form action="del_student.php" method="post">
                          Scholar No: <input type="text" name="roll_no">
                              <input type="submit" name="delete" value="Delete Student">
                        </form>
                      </center>
                    <?php
                }
                 ?>
                <?php
                    if(isset($_POST['show_teachers']))
                    {
                      ?>
                      <center>
                        <h3>Teachers Details:</h3><br>
                        <table>
                          <tr>
                            <td id="td" style="color: red;">ID</td>
                            <td id="td" style="color: red;">Name</td>
                            <td id="td" style="color: red;">Mobile</td>
                            <td id="td" style="color: red;">Courses</td>
                          </tr>
                        </table>
                      </center>
                      <?php
                      $query = "select * from teachers";
                      $query_run = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_assoc($query_run))
                      {
                        ?>
                            <center>
                              <table>
                                <tr>
                                  <td id="td"><?php echo $row['t_id'];?></td>
                                  <td id="td"><?php echo $row['name'];?></td>
                                  <td id="td"><?php echo $row['mobile'];?></td>
                                  <td id="td"><?php echo $row['courses'];?></td>
                                </tr>
                              </table>
                            </center>
                        <?php
                      }
                    }

                 ?>
        </div>


      </div>

  </body>
</html>
