<?php
include('../../db.php');
include('../../session.php');






    $d_id = $_SESSION['d_gen'];

        $sql = "SELECT * FROM `doctor` WHERE doctor_id= $d_id";
        $r= mysqli_query($con,$sql);
     

    if($r)
    {
    while($row=mysqli_fetch_assoc($r))
          { 
            $name = $row['doctor_name'];   
           $gender = $row['gender'];
           $pn = $row['phno'];               
            $em = $row['email'];
            $ed = $row['education'];
            $sp = $row['specialist'];
           $hd = $row['hos_id'];
          }
    }


   

?>
<html>
<head>
   
    <title>Doctor Report</title>
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
<th>Doctor Name </th>  <td><?php echo $name; ?></td> <th>Doctor ID </th>  <td><?php echo $d_id; ?></td>
</tr>

<tr>
<th>Mobile Number </th>  <td><?php echo $pn; ?></td> <th>E-Mail </th>  <td><?php echo $em; ?></td>
</tr>

<tr>
<th>Education </th>  <td><?php echo $ed; ?></td> <th>Specialist</th>  <td><?php echo $sp; ?></td>
</tr>

<tr>
<th>Working Hospital</th>  <td><?php echo $hd; ?></td>
</tr>
</table>
<hr>
<br>
<h3 align=center>Treatment Records</h3>
<table class="t_t" width=100%>
<tr>
<tr>
    
    <th>Hospital Name</th>
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

    $treat_sql = "SELECT * FROM `treatment` WHERE doc_id=$d_id";
    $t_r= mysqli_query($con,$treat_sql);
    $cnt = mysqli_num_rows($t_r);
    if($cnt)
    {
while($row=mysqli_fetch_assoc($t_r))
      {

        echo"  <tr><td> ".$row['hospital_name']."</td>  ";  
        
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
    <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
    <button class="btn btn-primary">Print</button></a>
</div>
    <div class="fixed-bottom text-left">
        <form action="" method="post">
            <a type="submit" name="redirect"href="admin_report.php" class="btn btn-primary">Go back</a>
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