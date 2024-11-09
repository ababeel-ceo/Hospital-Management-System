<?php include 'db.php'; 

include('session.php');


 ?>
<?php

$error="";

if(isset($_POST['sbt']))
{
$adminid = $_POST['tid'];
$adminpass = $_POST['tpass'];
$sql = "select  id,pass from cadmin where id='$adminid' AND pass='$adminpass'";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
if($count == 1)
{
    $error = "";
    $_SESSION['us']=$adminid;
    header("location: admin_mod/Admin mode/admin_add_hos.php");
}else
{
    $error="Invalid id or password";
    echo '<script>alert("Invalid id or password")</script>';
}
}
?>

<html>
    <head>
        <title>Login Centralized admin </title>
        <link rel="stylesheet" href="css/adminstyle.css">
        
    </head>
    <body>
        <div id="main">
            <img src="css/images/cadminlogo.png" alt="no images" height="200" width="200"/>
        <div id="admin-module">
        <p class="err"><?php  echo $error; ?></p>
        <form  method="POST" autocomplete="off" >
           <input type="text" name="tid" placeholder="admin id" required class="text-box"/><br><br>
            <input type="password" name="tpass" required placeholder="password" class="text-box"/><br><br>
            <input type="submit" value="LOGIN" name="sbt" class ="btn"/>
            
        </form>
       
       

    </div>
        </div>

    </body>
</html>

