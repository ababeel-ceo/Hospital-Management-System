<?php
include('../../db.php');
include('../../session.php');






    $p_id = $_SESSION['p_gen'];

        $sql = "SELECT * FROM `patient` WHERE patient_id= $p_id";
        $r= mysqli_query($con,$sql);
     

    if($r)
    {
    while($row=mysqli_fetch_assoc($r))
          { 
            $name = $row['patient_name'];   
           $dob = $row['date_of_birth'];               
            $hei = $row['height'];
            $wei = $row['weight'];
            $bg = $row['blood_group'];
            $gen = $row['gender'];
            $pn = $row['mobile_no'];
            
          }
    }


    //-------- fetching data from Treatment table--------------- //

    $treat_sql = "SELECT * FROM `treatment` WHERE pat_id=$p_id";
    $t_r= mysqli_query($con,$treat_sql);
    $cnt = mysqli_num_rows($t_r);
    
   

?>
<html>
<head>
   
    <title>Patient Report</title>
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
        .s_t tr th{
            padding:20px;
        }
        .s_t tr td{
            padding: 5px;
        }
       
        
        </style>
</head>
<body class="bg-light .bg-darken-xs">

<table width=100%>

<tr class="f_t">
<th>Patient Name </th>  <td><?php echo $name; ?></td>  <th>Patient ID </th>  <td><?php echo $p_id; ?></td>
</tr>

<tr>
<th>Date of birth </th>  <td><?php echo $dob; ?></td><th>Gender </th>  <td><?php echo $gen; ?></td>
</tr>
<tr>


<th>Height </th>  <td><?php echo $hei; ?></td> <th>Weight </th>  <td><?php echo $wei; ?></td>
</tr>

<tr>
<th>Mobile Number </th>  <td><?php echo $pn; ?></td>
</tr>
<hr>
<tr rowspan=3><th colspan=4>

</th></tr>

</table>
    <hr>
<h3 align=center>Treatment Records</h3>
<table border=2 width=100% class="s_t">
    <tr>
    <th>Doctor Name</th>
    <th>Hospital Name</th>
    <th>Date & Time </th>
    <th>Blood Pressure</th>
    <th>Disease</th>
    <th>Medicine</th>
    <th>Description</th>
    </tr>

    <?php
    
    if($cnt)
    {
while($row=mysqli_fetch_assoc($t_r))
      {

        echo"  <tr><td> ".$row['doctor_name']."</td>  ";  

        echo "  <td>".$row['hospital_name'] ."</td>";
        
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

<div class="fixed-bottom text-right">
    <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
    <button class="btn btn-primary">Print</button></a>
</div>

<div class="fixed-bottom">
    <form action="" method="post">
        <input class="btn btn-primary" type="submit" name="redirect" value="Go Back">
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST['redirect']))
{
    header('location:admin_report.php');
}
?>