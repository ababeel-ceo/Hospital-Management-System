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



        $s ="SELECT `hospital_id`, `hospital_name`, `email`, `phno`, `password`, `address` FROM `hospital` WHERE hospital_id=$i";
        $r2 = mysqli_query($con,$s);
      
       
        while($r1= mysqli_fetch_assoc($r2))
        {
            $id=$r1['hospital_id'];
            $name =$r1['hospital_name'];
            $pn=$r1['phno'];
            $em=$r1['email'];
            $add=$r1['address'];
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
      table tr th,table tr td{
        padding: 10px;
      }
    </style>
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

<!-- Form for add Doctor into the Hospital  -->
<div>
          <form action="" method="post">
          <label style="padding: 10px 10px 10px 0px;">Enter Patient Id </label><input type="number" name="pat_id" class="form-control">
          <br>
          <div class="text-center">
          <input id="bbt" value="View Records" name="view" type="submit" class="btn btn-primary " style="padding: auto 100px auto 100px;">
        
        </div>
        <br><br>
          </form>
        </div>
<!-- ---------------------------------------- -->

<table width=100% border=1>
  <tr>
    <th>Patient Name</th>
    <th>Doctor name</th>
    <th>Date & Time</th>
    <th>Blood Pressure</th>
    <th>Disease</th>
    <th>Medicine</th>
    <th>Description</th>

  </tr>



  
  <?php

if(isset($_POST['view']))
{
  if(!empty($_POST['pat_id'])){
      $dname = $_POST['pat_id'];


// Fetching the Patient name //
      $p_sql = "SELECT * FROM `treatment` WHERE pat_id=$dname and hos_id=$i";
      $r= mysqli_query($con, $p_sql);
      $cnt =mysqli_num_rows($r);
      if($cnt)
      {
      while($row=mysqli_fetch_assoc($r))
      {
       
            
        echo "  <td>".$row['patient_name'] ."</td>";

        echo" <td>".$row['doctor_name']."</td>";               
      
        echo "  <td>".$row['date_time']." </td>  ";

        echo "  <td>".$row['blood_pressure']." </td>  ";

        echo "  <td>".$row['disease']." </td>  ";

        echo "  <td>".$row['medicine']." </td>  ";

        echo "  <td>".$row['description']." </td>  ";

      }}else{
        echo '<script>alert(" Invalid patient id")</script>';
      }
// // ---------------------------------//

}else{
  echo '<script>alert(" Plz enter Patient ID")</script>';
}
}

?>


</table>

      <!-- ------------------------------------------ -->

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
  header('location:hos_dash_pat.php');
}

?>