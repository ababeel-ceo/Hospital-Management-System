<?php
include('../db.php');
include('../session.php');
$error="";
$error1="";


// First Hospital login //

if(isset($_POST['h_login']))
{
$hid1 = $_POST['hos_id'];
$pass1 = $_POST['pass'];
$sql= "SELECT `hospital_id`, `hospital_name`, `email`, `phno`, `password`, `address` FROM `hospital` WHERE hospital_id=$hid1 AND password='$pass1'";
// $sql = "select  id,pass from cadmin where id='$adminid' AND pass='$adminpass'";
$result = mysqli_query($con,$sql);
$count1 = mysqli_num_rows($result);
if($count1 == 1)
{
    $error = "";
    echo"<br>Successsfully Loged in ";
    // echo '<script>alert("Successfully Loged In")</script>';
    $_SESSION['us']=$hid1;
    
    header("location: ../hos_mod/hos_dash.php");
    
}else
{
    echo '<script>alert(" Invalid Id or Password")</script>';
    $error="Invalid id or password";
    
}
}


// Second Doctor Login //


if(isset($_POST['d_login']))
{
$hid = $_POST['doc_id'];
$pass = $_POST['d_pass'];
$sql= "SELECT `doctor_id`, `doctor_name`, `gender`, `phno`, `email`, `education`, `specialist`, `password` FROM `doctor` WHERE doctor_id=$hid AND password='$pass'";
$result = mysqli_query($con,$sql);
$count1 = mysqli_num_rows($result);
if($count1 == 1)
{
    $error1 = "";
    echo"<br>Successsfully Loged in ";
    // echo '<script>alert("Successfully Loged In")</script>';
    $_SESSION['us']=$hid;

    echo"$hid";
    
    header("location: ../doc_mod/doc_dash.php");
 
}else
{
    echo '<script>alert(" Invalid Id or Password")</script>';
    $error1="Invalid id or password";
    
}
}



?>











<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>
<script src="jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Hospital Login</h3>
                    <form method="post" action="">
                    <p style="color:red;"><?php echo"$error";?></p>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Hospital id *" name="hos_id" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password *" name="pass" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name="h_login" />
                        </div>
                        <div class="form-group">If you don't have account? 
                            <a href="../register/hos_register.php" class="ForgetPwd">Register</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Doctor Login</h3>
                    <form method="post" action="">
                    <p style="color:red;"><?php echo"$error1";?></p>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Doctor id *" value="" name="doc_id" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password *" value="" name="d_pass" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name="d_login"/>
                        </div>
                        <div class="form-group"><span style="color: white">If you don't have account?</span> 

                            <a href="../register/doc_register.php" class="ForgetPwd" value="Login">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>