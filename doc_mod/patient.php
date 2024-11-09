<?php
include('../db.php');
include('../session.php');
?>


<?php

if(isset($_POST['logout']))
{
  session_start();
  session_destroy();
  header('location:doc_dash_app.php');
}


if(!isset($_SESSION['us']))
{
  header('location:../index.php');
}

       
       $i = $_SESSION['us'];
       $sql = "SELECT * FROM `doctor` WHERE doctor_id= $i ";
       $r =mysqli_query($con,$sql);

        

        while($row=mysqli_fetch_assoc($r))
        {
            $n=$row['doctor_name'];

        }




       

        
        ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>DOCTOR DASH</title>
    <style>
      table, th, td {
            border: 1px solid black;
            padding: 10px 20px 10px 10px;
            
         }
         table tr td{
         
           
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
					  Copyright &copy;abdullahcreation
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


     

       

       <!-- content write here -->
        
        <form action="app_alert.php" method="post">
        <table width=100% >
          <tr>
            <th>S.NO</th>
            <th>Patient ID</th>
            <th>Date</th>
            <th>Time </th>
            <th>Status</th>
          </tr>
          <br><br>
        
       <?php 

        // Appoinment  coding //
        $ap_q = "SELECT * FROM `appoinment` WHERE doc_id = $i ";
        $no=0;
        
        $p_id="";
        $p_date="";
        $p_time ="";
        $app = mysqli_query($con,$ap_q);
       
         $c = mysqli_num_rows($app);
        if($c)
        {
          while($app_row = mysqli_fetch_assoc($app))
          {
              
                echo "<tr>  <td>".++$no ."</td>  ";    
            
                echo "  <td>".$app_row['pat_id'] ."</td>";

                

                echo"   <input type='hidden' name=pid value=".$app_row['pat_id'].">  ";                
              
                echo "  <td>".$app_row['date']." </td>  ";
                
                echo " <td>".$app_row['time']." </td> ";

                echo " <td> ".$app_row['status']."  </td>  </tr> ";


          }

          
          
          
        }else{
          echo"  <tr> <td colspan=2 ><h4> No Appoinments are available </h4> </tr>";
          // echo '<script>alert(" No Appoinments are available")</script>';
        }


        
        ?>
       </table>
       </form>
      
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