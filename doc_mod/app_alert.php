

<?php
include('../db.php');
include('../session.php');




$i = $_SESSION['us'];


if(isset($_POST['sbt']))
        {
          
              $p = $_POST['pid'];
              $pq ="UPDATE `appoinment` SET `status`='Accepted' WHERE  pat_id= $p AND doc_id=$i ";
              $cn = mysqli_query($con,$pq);
              
              header('location:doc_dash_app.php');
              
        }
?>

