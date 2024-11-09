<?php
include('../../db.php');
include('../../session.php');
?>


<?php
               if(!isset($_SESSION['us']))
               {
                   header('location:../../index.php');
               }
                
              $sid = $_SESSION['us'];

           
              
              $sql= "SELECT `patient_id`, `patient_name`, `date_of_birth`, `height`, `weight`, `blood_group`, `gender`, `mobile_no`, `password` FROM `patient` WHERE patient_id = $sid";
              $r = mysqli_query($con,$sql);

              
      while($row=mysqli_fetch_assoc($r))
      {
          $id=$row['patient_id'];
          $name=$row['patient_name'];
          $dob=$row['date_of_birth'];
          $h=$row['height'];
          $w=$row['weight'];
          $bg=$row['blood_group'];
          $g=$row['gender'];
          $mob=$row['mobile_no'];


      }

      
              ?>

<html>
<head><title>Profile</title>

<style>

table, th, td {
            border: 1px solid black;
           
            
         }
         table tr th, table tr td{
            padding:10px;
         }

</style>


</head>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>
<script src="jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<body class="home">



    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img style="padding-bottom:80px;" alt="" class="hidden-xs hidden-sm">
                        <!-- <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo"> -->
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li ><a href="pat_dash.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Profile</span></a></li>
                        <li><a href="pat_dash_app.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Appointment</span></a></li>
                        <li><a href="pat_dash_status.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Status</span></a></li>
                        <li><a href="pat_dash_treatment.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Treatment Records</span></a></li>
                        <!-- <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="search hidden-xs hidden-sm">
                            <h1>Hello, <?php echo "$name"; ?></h1>   
                            <!-- <input type="text" placeholder="Search" id="search"> -->
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <form action="" method="post">
                                    <li class="hidden-xs"><a href="../../session/session_des_doc_hos.php" class="add-project" data-toggle="modal" data-target="#add_project">LOGOUT</a></li>
                                    <!-- <li class="hidden-xs"><input type="submit" name="logout" value="LOGOUT"class="add-project" data-toggle="modal" data-target="#add_project"/></li> -->
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>




                <div class="user-dashboard">
                    <!-- <h1>Hello, <?php echo "$name"; ?></h1> -->
                    <div class="row" style="padding-bottom: 50px;">
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">

                            <!-- head -->
                        </div>
                        <!-- head -->
                    </div>
                    <table width=100% >
                        <tr >
                            <th>Name  </th> <td ><?php echo"$name";?></td> <th>ID </th>
                            <td><?php echo"$id";?></td>
                        </tr>
                        <tr>
                            <th >Date of Birth  </th><td ><?php echo"$dob";?></td><th s>Height  </th>
                            <td><?php echo"$h";?></td>
                        </tr>
                        <tr>
                            <th>weight </th><td><?php echo"$w";?></td><th >Blood Group  </th> <td ><?php echo"$bg";?></td>
                        </tr>
                       
                        <tr>
                            <th>Gender  </th><td><?php echo"$g";?></td><th >Mobile Number  </th> <td><?php echo"$mob";?></td>
                        </tr>
                       

                    </table>
                    
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                            <input type="text" placeholder="Project Title" name="name">
                            <input type="text" placeholder="Post of Post" name="mail">
                            <input type="text" placeholder="Author" name="passsword">
                            <textarea placeholder="Desicrption"></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>

</body>
</html>



<?php

if(isset($_POST['logout']))
{
        session_destroy();
        header('location:pat_dash.php');
}

?>