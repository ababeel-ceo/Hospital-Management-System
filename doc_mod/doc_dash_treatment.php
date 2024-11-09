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
       $sql = "SELECT * FROM `doctor` WHERE doctor_id= $i ";
       $r =mysqli_query($con,$sql);

        
      
        while($row=mysqli_fetch_assoc($r))
        {
            $doc_n=$row['doctor_name'];
            $wh=$row['hos_id'];
        }

        
        $s2 ="SELECT * FROM `hospital` WHERE hospital_id=$wh";
        $r3 = mysqli_query($con,$s2);
        $hos_n = "NIL";
        $hos_id=0;

        if($r3)
        {
          while($row2= mysqli_fetch_assoc($r3))
          {
              $hos_n = $row2['hospital_name'];
              $hos_id = $row2['hospital_id'];
          }
        }
        ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>DOCTOR DASH</title>
    <style>
      table, th, td {
            border: 1px solid black;
            padding:5px;  
           
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
                <h2 style="padding-right:30px;" class="mb-4">Welcome! Dr. <?php echo strtoupper($doc_n);?></h2>
                <form action="" method="post">
                  
                <li class="nav-item">
                    <input type="submit" value="LOGOUT" name="logout" class="nav-link" />
                </li>
                </form>
              </ul>
            </div>
          </div>
        </nav>

      


       <!--  Content Body Write Here -->
       <div>
          <form action="" method="post">
          <label style="padding: 10px 10px 10px 0px;" class="font-weight-bold">Enter Patient Id </label><input type="number" name="pat_id" class="form-control">
          <br>
          <div class="text-center">
          <input id="bbt" value="View Records" name="view" type="submit" class="btn btn-primary " style="padding: auto 100px auto 100px;">
          <input id="bbt" value="Enter current medication" name="enter" type="submit" class="btn btn-primary " style="padding: auto 100px auto 100px;">
        
        </div>
        <br><br>
          </form>
        </div>
        
        
<!-- FETCHING FROM TREATMENT TABLE  -->

<?php
if(isset($_POST['view']))
{
  echo"<table width=100%>
  <tr>
    <th>S.NO</th>
    <th>Patient Name</th>
    <th>Date and Time</th>
    <th>Disease</th>
    <th>Blood Pressure</th>
    <th>Medicine</th>
    <th>Description</th>
  </tr>";

$patient_id= $_POST['pat_id'];
$fetch_treat = "SELECT * FROM `treatment` WHERE  pat_id = $patient_id";
$res = mysqli_query($con,$fetch_treat);
$no=0;
if($res)
{
  while($row= mysqli_fetch_assoc($res))
  {
   
    echo "<tr>  <td>".++$no ."</td>  ";  
    echo "  <td>".$row['patient_name'] ."</td>  ";
    echo "  <td>".$row['date_time'] ."</td>  ";        
    echo "  <td>".$row['disease'] ."</td>  ";  
    echo " <td>".$row['blood_pressure']."</td>  "; 
    echo "<td>".$row['medicine']."</td>  ";  
    echo "  <td>".$row['description']."</td>  </tr>";  
    
    
     
     

  }
}
else{
  echo"  <tr> <td colspan=4 ><h4> No History of precription are available </h4> </tr>";
  // echo '<script>alert(" No Appoinments are available")</script>';
}

}


if(isset($_POST['enter']))
{
  include('treat.php');
  
}

if(isset($_POST['sub-frm']))
{
    $pat_n="";
    $patient_id= $_POST['pat_id'];
    $fetch_treat = "SELECT * FROM `patient`  WHERE patient_id = $patient_id";
    $res = mysqli_query($con,$fetch_treat);
    $no=0;
    if($res)
    {
      while($row= mysqli_fetch_assoc($res))
      {
       $pat_n=$row['patient_name'];  
      }
    }
$bp=$_POST['bp'];
$dis=$_POST['dis'];
$des=$_POST['des'];
$med=$_POST['med'];
$dt = date('y-m-d H:i:s');
if($hos_id>0)
{
$insert_sql= "INSERT INTO `treatment`VALUES ($patient_id,$i,$hos_id,$bp,'$dis','$med','$des','$dt','$pat_n','$hos_n','$doc_n')";
$check = mysqli_query($con,$insert_sql);
if($check)
{
    echo '<script>alert(" Treatment Updated ")</script>';
}else{
    echo '<script>alert(" Unable to insert")</script>';
}
// hos id check 
}
else{
  echo '<script>alert("You are not in any hospital ")</script>';
}
}





?>
</table>
<!-- ------------------------------ -->
     
        

        
       
         </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

