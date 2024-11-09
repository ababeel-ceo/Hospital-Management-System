
<?php
include('../db.php');
$error ="";

if(isset($_POST['register']))
{
$id = $_POST['hos_id'];
$name =$_POST['hos_name'];
$email = $_POST['email-address'];
$address = $_POST['address'];
$phno = $_POST['phno'];
$pass = $_POST['pass'];


$select ="SELECT * FROM hospital_list WHERE hospital_id = $id ";
$result = mysqli_query($con,$select);
$count = mysqli_num_rows($result);
if($count)
{
    if(preg_match("/^([0-9]{10})$/",$phno))
{
    $pattern = "/^[a-z A-Z\S]+[0-9\d]{2}+$/";
    if(preg_match($pattern, $pass) && strlen($pass)>6)
    {
    $insert = "INSERT INTO `hospital`(`hospital_id`, `hospital_name`, `email`, `phno`, `password`, `address`) VALUES ('$id','$name','$email','$phno','$pass','$address')";
    // echo" <br><br>Hospital id is in the admin table ";
    //echo '<script>alert("Given ID is already registerd")</script>';
    $r = mysqli_query($con,$insert);
    if($r)
    {
        // echo"<br><br>Inserted Successfully";
        echo '<script>alert("Your datails registered successfully!")</script>';
    }else{
        // echo"<br><br>Insertion Failed!!!!!!!";
        echo '<script>alert("Given ID is already registerd")</script>';
    }
}
// password Validation
else{
    $error="password should have number and character and length should have above 6";
    echo '<script>alert("Enter valid Password!")</script>';

}
}else{
    $error="Enter valid Mobile number!";
    echo '<script>alert("Enter valid Mobile number!")</script>';
}
}else{
    $error ="Contact admin to add your hospital lisence ID *";
    echo '<script>alert("Contact admin to add your hospital lisence ID")</script>';
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
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../login/lg.php">Login</a>
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
                        <div class="card-header">Hospital Registration Form</div>
                        <div class="card-body">
                            <form name="my-form" onsubmit="return validform()" action="" method="post">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Hospital ID</label>
                                    <div class="col-md-6">
                                        <input type="number" id="hos_id" class="form-control" name="hos_id" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email_address" class="form-control" name="email-address" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Hospital Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="hos_name" class="form-control" name="hos_name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                    <div class="col-md-6">
                                        <input type="number" id="phone_number" class="form-control" name="phno" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="address" class="form-control" name="address" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="pass" class="form-control" name="pass" required>
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

