<?php

include('../db.php');
include('../session.php');
$error="";


if(isset($_POST['sbt']))
{
$id = $_POST['id'];
$pass = $_POST['pass'];
$sql= "SELECT * FROM `patient` WHERE `patient_id`=$id AND  `password`='$pass' ";

$result = mysqli_query($con,$sql);
$count1 = mysqli_num_rows($result);
if($count1 == 1)
{
    $error = "";
    $_SESSION['us']=$id;
    header('location: ../patient_mod/pat_mod/pat_dash.php');
}else
{
    $error="Invalid id or password";
    
    
}
}




?>


<html>
<head>

<link rel="stylesheet" href="all.min.css">
<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.bundle.min.js"></script>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Patient Login</h5>
            <form method="post">
              <span style="color:red;"><?php echo"$error";?></span>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="id" required>
                <label for="floatingInput">Patient ID</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" required>
                <label for="floatingPassword">Password</label>
              </div>

              
              <div class="d-grid">
                <input class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="sbt" value="Sign in"></input>
              </div>
              <hr class="my-4">
              if you don't have an account<a href="../register/pat_register.php">  Register</a>
              <div class="d-grid">
               
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>