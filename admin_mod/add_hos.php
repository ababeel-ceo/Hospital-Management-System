

<?php
include('admin_dash.php');
include('../db.php');
include('../session.php');
if(!isset($_SESSION['us']))
{

	header('location:../index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Add Hospital</title>

</head>
<body>

    <form action="" method="post">
        <label for="">Enter Hospital ID </label><input type="number" name="hos_id"/><br><br>
        <input type="submit" name="add" value="Add"><input type="submit" name="del" value="Delete">
        
    </form>
</body>
</html>

<?php



if(isset($_POST['add']))
{
    $hos_id = $_POST['hos_id'];
    if(!empty($hos_id))
    {    
        $insert = "INSERT INTO `hospital_list`(`hospital_id`) VALUES ('$hos_id')";
        $result = mysqli_query($con,$insert);
        if($result)
        {
            echo"<h1>Inserted Successfully</h2>";
        }
        else{
            echo"Failed to insert !!!!!!!!";
        }
    }
    else{
    echo"Pls Enter ID ";
    }
}

if(isset($_POST['del']))
{
    $hos_id = $_POST['hos_id'];
    if(!empty($hos_id))
    {

        $del = "DELETE FROM `hospital_list` WHERE hospital_id = '$hos_id' ";
        $result = mysqli_query($con,$del);
        if($result)
        {
            echo"<h1>Dleted SuccessFully Successfully</h2>";
        }
        else{
            echo"Unable to delete";
        }
    }else{
        echo"Plz enter the value ";
    }
}


?>