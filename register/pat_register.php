
<?php
include('../db.php');
$error ="";

if(isset($_POST['register']))
{
$id = $_POST['pat_id'];
$name =$_POST['pat_name'];
$dob = $_POST['dob'];
$hei = $_POST['h'];
$wei = $_POST['w'];
$bg = $_POST['bg'];
$gen =0;
$ph = $_POST['ph'];
$pass = $_POST['pass'];


if(isset($_POST['gen']))
{
    if($_POST['gen'] == 1)
    {
        $gen="male";
    }else{
        $gen="female";
    }
    
}
if(preg_match("/^([0-9]{10})$/",$ph))
{
    $pattern = "/^[a-z A-Z\S]+[0-9\d]{2}+$/";
    if(preg_match($pattern, $pass) && strlen($pass)>6)
    {
    $insert = "INSERT INTO `patient`(`patient_id`, `patient_name`, `date_of_birth`, `height`, `weight`, `blood_group`, `gender`, `mobile_no`, `password`) VALUES ($id,'$name','$dob',$hei,$wei,'$bg','$gen',$ph,'$pass')";
    $r = mysqli_query($con,$insert);
    if($r)
    {
        //echo"<br><br>Inserted Successfully";
        echo '<script>alert("Your details registered successfully!")</script>';
    }else{
       $error="Patient ID already exist";
       echo '<script>alert("Patient ID already exist!")</script>';
    }
}
// password Validation
else{
    $error="password should have number and character and length should have above 6";
    echo '<script>alert("Enter valid Password!")</script>';

}

}

else{
    $error="Enter valid Mobile number!";
    echo '<script>alert("Enter valid Mobile number!")</script>';
}
}




?>





<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>
<script src="jquery.min.js"></script>
<script src="validation.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
   
    <title>Registration Form</title>


    <style>
        #ermsg{
            color : red;
        }

        .gen{
            margin-top: 13px;
            
        }
        #female{
            margin-left: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../pat_login/login pat.php">Login</a>
            </li>
            <li class="nav-item">
               <!-- <a class="nav-link" href="#">Register</a> -->
            </li>
        </ul>

    </div>
    </div>
</nav>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Patient Registration Form</div>
                        <div class="card-body">
                            <form name="my-form"  action="" method="post">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Patient ID</label>
                                    <div class="col-md-6">
                                        <input type="number" id="pat_id" class="form-control" name="pat_id" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Patient Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="pat_name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                                    <div class="col-md-6">
                                        <input type="date" id="dob" class="form-control" name="dob" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Height </label>
                                    <div class="col-md-6">
                                        <input type="number" id="phone_number" class="form-control" name="h" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Weight</label>
                                    <div class="col-md-6">
                                        <input type="text" id="address" class="form-control" name="w" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Blood Group</label>
                                    <div class="col-md-6">
                                        <input type="text" id="pass" class="form-control" name="bg" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Gender</label>
                                    <div class="col-md-6">
                                        <input type="radio" id="male" class="gen" name="gen" value=1 checked=true>Male</input>
                                        <input type="radio" id="female" class="gen" name="gen" value=2>Female</input>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Phone </label>
                                    <div class="col-md-6">
                                        <input type="number" id="address" class="form-control" name="ph" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="address" class="form-control" name="pass" required>
                                    </div>
                                </div>
                                    <div class="col-md-6 offset-md-4">
                                        <input type="submit" class="btn btn-primary" value="Register" name="register">
                                        
                                    </input>
                                    </div>
                                    <span id="ermsg"><?php echo"$error";?></span>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>

</body>
</html>

