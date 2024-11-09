<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    
<form action="" method="POST">

<div class="lab">
<label>License ID    </label>
<input  type="text"name="id" />
</div>

<div class="lab">
<label>Doctor Name </label>
<input type="text"name="name" />
</div>

<div class="lab">
<label>Date Of Birth  </label>
<input  type="text"name="dob" />
</div>

<div class="lab">
<label>Qualification  </label>
<input type="text"name="qal" />
</div>

<div class="lab">
<label>Password </label>
<input  type="text"name="pass" />
</div>

<div class="lab">
<label>Working Hospital ID </label>
<input  type="text"name="hid" />
</div>

<div class="lab">
<input type="submit"name="sbt" class="sbt-btn"/>
</div>
</form>



</form>
</body>
</html>

<?php

if(isset($_POST['sbt']))
{
    $lid = $_POST['id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $qual = $_POST['qal'];
    $pass = $_POST['pass'];
    $hid = $_POST['hid'];

    echo"$lid.<br/>";
    echo"$name.<br/>";
    echo"$dob.<br/>";
    echo"$qual.<br/>";

    echo"$pass.<br/>";
    echo"$hid.<br/>";


    $insert = "INSERT INTO `doctor`(`id`, `name`, `dob`, `qualification`, `password`, `hos_id`) VALUES ('$lid','$name','$dob','$qual','$pass','$hid')";
    $result = mysqli_query($con,$insert);
    if($result)
    {
        echo"<h2>Inserted Succesfully</h2>";
    }else{
       die("<h2>Insertion failed</h2>");
    }

    
}
?>