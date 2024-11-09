<?php
include('../db.php');
include('../session.php');
?>


<?php

if(isset($_POST['logout']))
{
  session_start();
  session_destroy();
  header('location:doc_dash.php');
}


if(!isset($_SESSION['us']))
{
  header('location:../index.php');
}

       
       $i = $_SESSION['us'];
       $sql = "SELECT `doctor_id`, `doctor_name`, `gender`, `phno`, `email`, `education`, `specialist`, `password` FROM `doctor` WHERE doctor_id= $i ";
       $r =mysqli_query($con,$sql);

        

        while($row=mysqli_fetch_assoc($r))
        {
            $n=$row['doctor_name'];

        }

        $s ="SELECT `doctor_id`, `doctor_name`, `gender`, `phno`, `email`, `education`, `specialist`, `password`, `hos_id` FROM `doctor` WHERE doctor_id=$i";
        $r2 = mysqli_query($con,$s);
      
       
        while($r1= mysqli_fetch_assoc($r2))
        {
            $id=$r1['doctor_id'];
            $name =$r1['doctor_name'];
            $gen=$r1['gender'];
            $em=$r1['phno'];
            $pn=$r1['email'];
            $ed=$r1['education'];
            $spl=$r1['specialist'];
            $wh=$r1['hos_id'];
        }
        $s2 ="SELECT * FROM `hospital` WHERE hospital_id=$wh";
        $r3 = mysqli_query($con,$s2);
        $hos_n="NIL";
        if($r3)
        {
        while($row2= mysqli_fetch_assoc($r3))
        {
            $hos_n = $row2['hospital_name'];
        }
      }
        // if($hos_n==null)
        // {
        //   $hos_n="NIL";
        // }

        ?>



<!doctype html>
<html lang="en">
  <head>
  	<title>DOCTOR DASH</title>
    <style>
      table, th, td {
            border: 0px solid black;
            padding:10px;
            
         }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="index.html" class="logo"> </a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="doc_dash.php"><span class="fa fa-user"></span> Profile</a>
          </li>
          <li>
              <a href="doc_dash_app.php"><span class="fa fa-calendar"></span>Appointment</a>
          </li>
          
          <li>
            <a href="patient.php"><span class="fa fa-wheelchair"></span> Status</a>
          </li>
          <li>
            <a href="doc_dash_treatment.php"><span class="fa fa-stethoscope"></span> Treatment</a>
          </li>
        </ul>

        <div class="footer">
        	<p>
					  Copyright &copy;ababeelcreation
					</p>
        </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <!-- <a class="nav-link" href="#">Home</a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">About</a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Portfolio</a> -->
                </li>
                <h2 style="padding-right:30px;" class="mb-4">Welcome! Dr. <?php echo strtoupper($n);?></h2>
                <form action="" method="post">
                <li class="nav-item">
                    <input type="submit" value="LOGOUT" name="logout" class="nav-link" />
                </li>
                </form>
              </ul>
            </div>
          </div>
        </nav>


     



      <!-- content write Here -->

        

        <table width=100% >

        <tr>
          <th>Name </th><td><?php echo $name; ?></td>
          <th>ID</th><td><?php  echo "$id "; ?></td>
        </tr>
        
        <tr >
          <th>Gender</th> <td ><?php echo"$gen"; ?></td>
          <th>Phone No</th><td><?php echo"$em"; ?></td>
        </tr>
        <tr >
          <th>E-mail</th><td ><?php echo"$pn"; ?></td>
          <th>Education</th><td><?php echo"$ed"; ?></td>
        </tr>
        
         <tr>
          <th>Specialist</th><td><?php echo"$spl"; ?></td>
          <th>Working Hospital</th><td><?php echo"$hos_n"; ?></td>
        </tr>
       
        </table>
       
         </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

<?php


?>