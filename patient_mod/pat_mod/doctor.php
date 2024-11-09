<?php
include('../../db.php');

$sql = "SELECT * FROM doctor WHERE hos_id = { $_POST["id"] }";
$res=mysqli_query($con,$sql);

echo"<option value="">select</option> ";
    while($row = $res->fetch_assoc())
    {
        echo '<option value='.$row['doctor_id'].'>'.$row['doctor_name'].'</option>';
    }
?>