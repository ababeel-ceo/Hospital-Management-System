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
<body class="bg-light .bg-darken-xs">
  <div class="tabs-to-dropdown">
    <div class="nav-wrapper d-flex align-items-center justify-content-between">
      <ul class="nav nav-pills d-none d-md-flex" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-company-tab" data-toggle="pill" href="admin_add_hos.php" role="tab" aria-controls="pills-company" aria-selected="true">ADD HOSPITAL</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link  active" id="pills-product-tab" data-toggle="pill" href="admin_add_doc.php" role="tab" aria-controls="pills-product" aria-selected="true">ADD DOCTOR</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-news-tab" data-toggle="pill" href="admin_report.php" role="tab" aria-controls="pills-news" aria-selected="true">REPORT</a>
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
          <label class="mb-3 font-weight-bold h4">Enter Doctor ID</label>

          <div  class="form-group">
          <form action=""method="post">

            <input type="number" class="form-control" name="doc_id"><br><br>

            <div class="text-center">
            <input type="submit" value="Add Doctor" class="btn btn-secondary " name="add">
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
include('../../db.php');
include('../../session.php');
if(!isset($_SESSION['us']))
{

	header('location:../../index.php');
}

?>



<?php



if(isset($_POST['add']))
{
    $doc_id = $_POST['doc_id'];
    if(!empty($doc_id))
    {    
        $insert = "INSERT INTO `doctor_id_list`(`doc_id`) VALUES ($doc_id)";
        $result = mysqli_query($con,$insert);
        if($result)
        {
          echo '<script>alert(" Inserted Successfully")</script>';
        }
        else{
          echo '<script>alert("Given ID is Already Exist !!!!!!!!")</script>';
        }
    }
    else{
      echo '<script>alert("Pls Enter ID")</script>';
    }
}

// if(isset($_POST['del']))
// {
//     $doc_id = $_POST['doc_id'];
//     if(!empty($doc_id))
//     {

//         $del = "DELETE FROM `doctor_id_list` WHERE doc_id = '$doc_id' ";
//         $result = mysqli_query($con,$del);
//         if($result)
//         {
//             echo"<h1>Deleted SuccessFully Successfully</h2>";
//         }
//         else{
//             echo"Unable to delete";
//         }
//     }else{
//         echo"Plz enter the value ";
//     }
// }




if(isset($_POST['logout']))
{
  session_destroy();
  header('location:admin_add_doc.php');
}
?>