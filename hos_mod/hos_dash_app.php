<?php
include('../db.php');
include('../session.php');
?>


<?php

if(!isset($_SESSION['us']))
{
  header('location:../index.php');
}

        $n="";
       $i = $_SESSION['us'];
       $sql = "SELECT * FROM `hospital` WHERE hospital_id= $i ";
       $r =mysqli_query($con,$sql);

        

        while($row=mysqli_fetch_assoc($r))
        {
            $n=$row['hospital_name'];

        }



        ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Hospital</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">




        <style>
           .f_t th,.f_t td {
            border: 2px solid gray;
            padding: 10px 20px 10px 10px;
            
         }
          
         .f_t th{
                  font-size: 1.1rem;
        }
        </style>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="index.html" class="logo"> </a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="hos_dash.php"><span class="fa fa-h-square"></span> Profile</a>
          </li>
          <li>
              <a href="hos_dash_app.php"><span class="fa fa-calendar"></span>Appointment</a>
          </li>
          <li>
            <a href="hos_dash_doc.php"><span class="fa fa-user-md"></span>Doctor</a>
          </li>
          <li>
            <a href="hos_dash_pat.php"><span class="fa fa-wheelchair"></span> Patient</a>
          </li>
          <!-- <li>
            <a href="#"><span class="fa fa-paper-plane"></span> Contacts</a>
          </li> -->
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
                <form action="" method="post">
                <li class="nav-item">
                    <input type="submit" value="LOGOUT" name="logout" class="nav-link" />
                </li>
                </form>
              </ul>
            </div>
          </div>
        </nav>


      



        <h2 class="mb-4"> <?php echo strtoupper($n);?></h2>

        
        <form action="app_alert.php" method="post">
        <table  width=100% class="f_t">
          <tr>
            <th>S.NO</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Date</th>
            <th>Time </th>
            <th>status</th>
          </tr>
          <br><br>
        
       <?php 

        // Appoinment  coding //
        $ap_q = "SELECT * FROM `appoinment` WHERE hos_id = $i ";
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

                echo" <td>".$app_row['doc_id']."</td>";               
              
                echo "  <td>".$app_row['date']." </td>  ";
                
                echo " <td>".$app_row['time']." </td> ";

                echo"<td>".$app_row['status']."</td>";
               


          }

          
          
          
        }else{
          echo"  <tr> <td colspan=2 ><h4> No Appoinments are available </h4> </tr>";
          echo '<script>alert(" No Appoinments are available")</script>';
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
if(isset($_POST['logout']))
{
  session_destroy();
  header('location:hos_dash_app.php');
}

?>