<?php
include('../../db.php');
include('../../session.php');
if(!isset($_SESSION['us']))
{
	header('location:../../index.php');
}

?>

<html>
<head>
<title> Admin Page</title>
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\css file.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-grid.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-grid.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-grid.min.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-grid.min.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-reboot.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-reboot.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-reboot.min.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-reboot.min.css.map">
<script src="bootstrap-4.6.2-dist\js\js file.js"></script>
<script src="bootstrap-4.6.2-dist\js\bootstrap.bundle.js"></script>
<script src="bootstrap-4.6.2-dist\js\bootstrap.bundle.js.map"></script>
<script src="bootstrap-4.6.2-dist\js\bootstrap.bundle.min.js"></script>
<script src="bootstrap-4.6.2-dist\js\bootstrap.bundle.min.js.map"></script>
<script src="bootstrap-4.6.2-dist\js\bootstrap.js"></script>
<script src="bootstrap-4.6.2-dist\js\bootstrap.js.map"></script>
<script src="bootstrap-4.6.2-dist\js\bootstrap.min.js"></script>
<script src="bootstrap-4.6.2-dist\js\bootstrap.min.js.map"></script>



</head>
<body >
  <div class="tabs-to-dropdown">
    <div class="nav-wrapper d-flex align-items-center justify-content-between">
      <ul class="nav nav-pills d-none d-md-flex" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link " id="pills-company-tab" data-toggle="pill" href="admin_add_hos.php" role="tab" aria-controls="pills-company" aria-selected="true">ADD HOSPITAL</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link " id="pills-product-tab" data-toggle="pill" href="admin_add_doc.php" role="tab" aria-controls="pills-product" aria-selected="true">ADD DOCTOR</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="pills-news-tab" data-toggle="pill" href="admin_report.php" role="tab" aria-controls="pills-news" aria-selected="true">REPORT</a>
        </li>
        <li class="nav-item" role="presentation">
          <!-- <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Contact</a> -->
        </li>
      </ul>
  
      <ul class="list-group list-group-horizontal">
        <li class="list-group-item  bg-dark">
          <form action="" method="post">
         <input type="submit" Value="LOGOUT"class="text-white bg-dark" name="logout" >
         </form>
        </li>
      </ul>
    </div>
  
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab">
        <div class="container-fluid">
          

          <div  class="form-group">
          <form action=""method="post">
            <div class="text-center">
            <input type="submit" value="Doctor Report" class="btn btn-secondary btn-lg"  name="doc-rep">
            <input type="submit" value="Hospital Report" class="btn btn-secondary btn-lg"  name="hos-rep">
            <input type="submit" value="Patient Report" class="btn btn-secondary btn-lg"  name="pat-rep">
          </div>

          </form>

          
        </div>
        
      </div>
      
      
  
  <footer class="page-footer">
    <span>&copy; abdullahcreation </span>
    
  </footer>

</body>
</html>




<?php

if(isset($_POST['doc-rep']))
{
 include('doc.html');
}
if(isset($_POST['hos-rep']))
{
  include('hos.html');
}
if(isset($_POST['pat-rep']))
{
  include('pat.html');
}

?>





<?php
if(isset($_POST['logout']))
{
  session_destroy();
  header('location:admin_report.php');
}





// -------------Report Generation Check for Doctor------------------//



if(isset($_POST['d_rep']))
{

    $d_id = $_POST['doc_id'];
        $sql = "SELECT * FROM `doctor` WHERE doctor_id= $d_id";
        $r= mysqli_query($con,$sql);
        $count = mysqli_num_rows($r);
if($count < 1)
{
  echo '<script>alert("Invalid id plz enter valid doctor id")</script>';
    
}else
{
    $_SESSION['d_gen']= $d_id;
    header("location: doc_report.php");   
}
}

//-------------Report Generation Check for Hospital------------------//

if(isset($_POST['h_rep']))
{

    $h_id = $_POST['hos_id'];
        $sql = "SELECT * FROM `hospital` WHERE hospital_id= $h_id";
        $r= mysqli_query($con,$sql);
        $count = mysqli_num_rows($r);
if($count < 1)
{
  echo '<script>alert("Invalid id plz enter valid hospital id")</script>';
    
}else
{
    $_SESSION['h_gen']= $h_id;
    header("location: hos_report.php");   
}
}


//-------------Report Generation Check for Hospital------------------//

if(isset($_POST['p_rep']))
{

    $p_id = $_POST['pat_id'];
        $sql = "SELECT * FROM `patient` WHERE patient_id= $p_id";
        $r= mysqli_query($con,$sql);
        $count = mysqli_num_rows($r);
if($count < 1)
{
  echo '<script>alert("Invalid id plz enter valid patient id")</script>';
    
}else
{
    $_SESSION['p_gen']= $p_id;
    header("location: pat_report.php");   
}
}

?>