<?php
include('../../db.php');
include('../../session.php');
?>


<?php
               if(!isset($_SESSION['us']))
               {
                
                   header('location:../../index.php');
               }
                
              $sid = $_SESSION['us'];

              $sql= "SELECT `patient_id`, `patient_name`, `date_of_birth`, `height`, `weight`, `blood_group`, `gender`, `mobile_no`, `password` FROM `patient` WHERE patient_id = $sid";
              $r = mysqli_query($con,$sql);

              
      while($row=mysqli_fetch_assoc($r))
      {
          $id=$row['patient_id'];
          $name=$row['patient_name'];
          $dob=$row['date_of_birth'];
          $h=$row['height'];
          $w=$row['weight'];
          $bg=$row['blood_group'];
          $g=$row['gender'];
          $mob=$row['mobile_no'];


      }

      
              ?>

<html>
<head><title>Profile</title>

<style>

table, th, td {
            border: 0px solid black;
            
         }


#hosp,#doct{
    height: 40px;
}

</style>


</head>
<link rel="stylesheet" href="dp box/dp.min.css">
<link rel="stylesheet" href="dp box/dp.min.js">
<link rel="stylesheet" href="dp box/dp1.min.js">
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>
<script src="jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<body class="home">



    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img style="padding-bottom:80px;" alt="" class="hidden-xs hidden-sm">
                        <!-- <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo"> -->
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li ><a href="pat_dash.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Profile</span></a></li>
                        <li><a href="pat_dash_app.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Appointment</span></a></li>
                        <li><a href="pat_dash_status.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Status</span></a></li>
                        <li><a href="pat_dash_treatment.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Treatment Records</span></a></li>
                        <!-- <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                           
                            <div class="search hidden-xs hidden-sm">
                            <h1>Hello, <?php echo "$name"; ?></h1>   
                            <!-- <input type="text" placeholder="Search" id="search"> -->
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <form action="" method="post">
                                    <li class="hidden-xs"><a href="../../session/session_des_doc_hos.php" class="add-project" data-toggle="modal" data-target="#add_project">LOGOUT</a></li>
                                    <!-- <li class="hidden-xs"><input type="submit" name="logout" value="LOGOUT"class="add-project" data-toggle="modal" data-target="#add_project"/></li> -->
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>

                


                <div class="user-dashboard">
                    <!-- <h1>Hello, <?php echo "$name"; ?></h1> -->
                    <div class="row" style="padding-bottom: 50px;">
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">

                            <!-- head -->
                        </div>
                        <!-- head -->
                    </div>
 
                    


                    <?php


$empty_msg="";
if(isset($_POST['form-sbt']))
{
    if(!empty($_POST['hospital']) && !empty($_POST['doctor']) && !empty($_POST['date']) && !empty($_POST['time']))
    {
        $h_id = $_POST['hospital'];
        $d_id = $_POST['doctor'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $st = "pending";
       
        $fdtd ="SELECT * FROM `appoinment` WHERE doc_id=$d_id AND date=$time AND time=$time"; 
        $fdtd = mysqli_query($con ,$fdtd);

        $flag=0;
        if($fdtd)
        {
        while($r= mysqli_fetch_assoc($fdtd))
        {
            $flag =1;
        }
    }else{
        if($flag == 1)
        {
                echo'<script>alert("Doctor is already appointed by others")</script>';
        }else{
            echo'<script>alert("Doctor is already appointed by others")</script>';
        }
        

        // --------------------------------------------//
                        // INSERT HOSPITAL AND DOCTOR NAME //


        $q_hos = "SELECT * FROM `hospital` WHERE hospital_id = $h_id";
        $q_doc = "SELECT * FROM `doctor` WHERE doctor_id = $d_id ";
        $fetch_hos = mysqli_query($con,$q_hos);
        $fetch_doc = mysqli_query($con,$q_doc);
        while($fetch= mysqli_fetch_assoc($fetch_hos))
        {
            $name_of_hos = $fetch['hospital_name'];
        }
        while($fetch= mysqli_fetch_assoc($fetch_doc))
        {
            $name_of_doc = $fetch['doctor_name'];
        }
        // --------------------------------------------//
        // $qr = "INSERT INTO `appoinment`(`pat_id`, `doc_id`, `hos_id`, `date`, `time`, `status`) VALUES ($sid,$d_id,$h_id,'$date','$time','$st')";
        $qr = "INSERT INTO `appoinment`(`pat_id`, `doc_id`, `hos_id`, `date`, `time`, `status`, `doctor_name`, `hospital_name`) VALUES ($sid,$d_id,$h_id,'$date','$time','$st',' $name_of_doc',' $name_of_hos')";

        $ress= mysqli_query($con,$qr);
        if($ress)
        {
            $empty_msg="Inserted Successfully";
            echo '<script>alert(" Inserted Successfully")</script>';
        }
        else{
            echo '<script>alert(" Failed to insert")</script>';
            $empty_msg="Failed to insert ";
        }
    }   
    }
    else{
            $empty_msg = "please fill all fields ";
            echo '<script>alert("Please fill All fields ")</script>';
            
    }
}


?>





<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
<form method="post" action="">
<!-- First Option Box -->


<label>Hospital </label><select name="hospital" class="form-control form-control-lg hospital" id="hosp" required>
<option value="0">Select Hospital</option>
<?php

$sql = mysqli_query($con,"select * from hospital");
while($row=mysqli_fetch_array($sql))
{
echo '<option value="'.$row['hospital_id'].'">'.$row['hospital_name'].'</option>';
} ?>
</select><br/><br/>
<!-- ------------------------------------------------------------------------------- -->


<label>Doctor </label><select name="doctor" class="form-control form-control-lg hospital" id="doct" required>
<option value="0">Select Doctor</option>
<?php

$sql = mysqli_query($con,"select * from doctor");
while($row=mysqli_fetch_array($sql))
{
echo '<option value="'.$row['doctor_id'].'">'.$row['doctor_name'].'</option>';
} ?>
</select><br/><br/>



<!-- ------------------------------------------------------------------------------ -->
<!-- <label>Doctor </label><select name="doctor" class="form-control form-control-lg doctor" id="doct" required>
<option>Select Doctor</option>
</select> -->
<br>
<label>Date </label><label style=" margin-left:150px;">Time </label><br>
<input type="Date" class=" form-control-lg " style="padding: 5px; " name="date" required></input>

<input type="time" class=" form-control-lg " style="padding: 5px; margin-left:55px;" name="time" required></input>
<br>

<input type="submit" class="btn btn-primary form-control-lg" style="width:100%; padding: 10px; margin-top: 20px;" name="form-sbt">
<br>
<p style="padding:50px; text-align:center; font-size: 2rem;" class="form-control-lg"><?php  echo $empty_msg; ?></p>


    <!-- form-control form-control-lg  -->


        </form>

<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- <script type="text/javascript">
$(document).ready(function()
{
$(".hospital").change(function()
{
var hospital_id=$(this).val();
var post_id = 'id='+ hospital_id;

$.ajax
({
type: "POST",
url: "ajax.php",
data: post_id,
cache: false,
success: function(doc)
{
$(".doctor").html(doc);
} 
});

});
});
</script> -->

 

<!---------------------------------------------------------------------------------------------------------->
                
                </div>
            </div>
        </div>

    </div>



 
   

</body>
</html>



<?php

if(isset($_POST['logout']))
{
        
        session_destroy();
        header('location:pat_dash_app.php');
}

?>