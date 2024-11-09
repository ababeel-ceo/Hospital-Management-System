<?php
include('../../db.php');
include('../../session.php');






    $h_id = $_SESSION['h_gen'];

        $sql = "SELECT * FROM `hospital` WHERE hospital_id= $h_id";
        $r= mysqli_query($con,$sql);
     

    if($r)
    {
    while($row=mysqli_fetch_assoc($r))
          { 
            $name = $row['hospital_name'];   
           $pn = $row['phno'];               
            $em = $row['email'];
            $add = $row['address'];
          }
    }


   

?>
<html>
<head>
   
    <title>Hospital Report</title>

    <link rel="stylesheet" href="bootstrap-4.6.2-dist\css\css file.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-grid.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-grid.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-grid.min.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-grid.min.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-reboot.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-reboot.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-reboot.min.css">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap-reboot.min.css.map">
<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\font.min.css">




    
    <style>
       .f_t{
        border-collapse: collapse;
       }
       .f_t tr th{
           font-family:Arial;
           font-size: 1.1rem;
           text-align: left;
           padding-right: 20px;
           padding-left: 10px;
           
       }
       .f_t tr td{
           padding-right:40px;
       }
       .s_t tr th,.s_t tr td{
           padding:20px;
           border: 2px solid black;
           border-collapse: collapse;
       }
       .s_t tr td{
           padding: 5px;
       }
       .s_t caption{
        font-size:2rem;
        font: Arial;
       }
       .s_t{
        border: 2 solid black;
        border-collapse: collapse;
       }
       .s_t th,td{
        border-collapse: collapse;
        
       }
    /* Third table style */
    .t_t tr th,.t_t tr td{
           padding:20px;
           border: 2px solid black;
           border-collapse: collapse;
       }
       .t_t tr td{
           padding: 5px;
       }
       .t_t caption{
        font-size:2rem;
        font: Arial;
       }
       .t_t{
        border: 2 solid black;
        border-collapse: collapse;
       }
       .t_t th,td{
        border-collapse: collapse;
        
       }
       
       </style>
</head>
<body class="bg-light .bg-darken-xs">

<hr>
<table width=100% class="f_t">

<tr>
<th>Hospital Name </th>  <td><?php echo $name; ?></td> <th>Hospital ID </th>  <td><?php echo $h_id; ?></td>
</tr>

<tr>
<th>Phone Number </th>  <td><?php echo $pn; ?></td> <th>E-Mail </th>  <td><?php echo $em; ?></td>
</tr>

<tr>
<th>Address </th>  <td><?php echo $add; ?></td>
</tr>

</table>

<hr>
<h3 align=center>Working Doctors</h3>
<table width=100% class="s_t"  S>

<th>Doctor Name</th>
<th>Doctor ID</th>
<th>Gender</th>
<th>Mobile Number</th>
<th>E-Mail</th>
<th>Education</th>
<th>Specialist</th>


<?php

    $doc_sql = "SELECT * FROM doctor WHERE hos_id=$h_id";
    $d_r= mysqli_query($con,$doc_sql);
    $cnt = mysqli_num_rows($d_r);
    if($cnt)
    {
while($row=mysqli_fetch_assoc($d_r))
      {

        echo"  <tr><td> ".$row['doctor_name']."</td>  ";  

        echo "  <td>".$row['doctor_id'] ."</td>";
        
        echo "  <td>".$row['gender']." </td>  ";
            
        echo " <td>".$row['phno']." </td> ";

        echo " <td>".$row['email']." </td>  ";             

        echo " <td>".$row['education']." </td>  ";

        echo " <td>".$row['education']." </td>  </tr> ";
          
         
      }
    }
    else{
        echo'<tr><td colspan=7 align=center>No Records Founds</td></tr>';
    }
    
    ?>

</table>
<br><br>
<h3 align=center>Treatment Records</h3>
<table class="t_t" width=100%>
<tr>
<tr>
    
    <th>Doctor Name</th>
    <th>Patient Name</th>
    <th>Date & Time </th>
    <th>Blood Pressure</th>
    <th>Disease</th>
    <th>Medicine</th>
    <th>Description</th>
    </tr>
</tr>

<?php
    
    //-------- fetching data from Treatment table--------------- //

    $treat_sql = "SELECT * FROM `treatment` WHERE hos_id=$h_id";
    $t_r= mysqli_query($con,$treat_sql);
    $cnt = mysqli_num_rows($t_r);
    if($cnt)
    {
while($row=mysqli_fetch_assoc($t_r))
      {

        echo"  <tr><td> ".$row['doctor_name']."</td>  ";  
        
        echo "  <td>".$row['patient_name']." </td>  ";

        echo "  <td>".$row['date_time']." </td>  ";
            
        echo " <td>".$row['blood_pressure']." </td> ";

        echo " <td>".$row['disease']." </td>  ";             

        echo " <td>".$row['medicine']." </td>  ";

        echo " <td>".$row['description']." </td>  </tr> ";
          
         
      }
    }
    else{
        echo'<tr><td colspan=7 align=center>No Records Founds</td></tr>';
    }
    
    ?>
</table>
<hr>
    
<div class="fixed-bottom text-right">
    <a class="btn btn-sm btn-info float-right mr-1 d-print-none" onclick="javascript:window.print();" data-abc="true">
    <button class="btn btn-primary">Print</button></a>
</div>
<div class="fixed-bottom">
    <form action="" method="post">
        <a class="btn btn-primary" href="admin_report.php" name="redirect" value="Go Back">Go Back</a>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST['redirect']))
{
    // header('location:admin_report.php');
}
?>