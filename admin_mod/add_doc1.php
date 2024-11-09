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
    
    <title>Add doctor</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Enter Doctor ID </label><input type="number" name="doc_id"/><br><br>
        <input type="submit" name="add" value="Add"><input type="submit" name="del" value="Delete">
        
    </form>
</body>
</html>

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
            echo"<h1>Inserted Successfully</h2>";
        }
        else{
            echo"Given ID is Already Exist !!!!!!!!";
        }
    }
    else{
    echo"Pls Enter ID ";
    }
}

if(isset($_POST['del']))
{
    $doc_id = $_POST['doc_id'];
    if(!empty($doc_id))
    {

        $del = "DELETE FROM `doctor_id_list` WHERE doc_id = '$doc_id' ";
        $result = mysqli_query($con,$del);
        if($result)
        {
            echo"<h1>Deleted SuccessFully Successfully</h2>";
        }
        else{
            echo"Unable to delete";
        }
    }else{
        echo"Plz enter the value ";
    }
}


?>