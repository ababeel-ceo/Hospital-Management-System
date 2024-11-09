<?php
include('../db.php');
include('../session.php');
?>


<?php

if(!isset($_SESSION['us']))
{
  header('location:../index.php');
}

        $n="";
       $i = $_SESSION['us'];
       $sql = "SELECT * FROM `hospital` WHERE hospital_id= $i ";
       $r =mysqli_query($con,$sql);

        

        while($row=mysqli_fetch_assoc($r))
        {
            $n=$row['hospital_name'];

        }



        $s ="SELECT * FROM `doctor` WHERE hos_id=$i";
        $r2 = mysqli_query($con,$s);
      
       

        ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Hospital</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">

    <style>

table, th, td {
            border: 0px solid black;
            padding: 10px 20px 10px 10px;
            font-size:1.5rem;
            
         }
          table tr td{
          margin-left: auto;
            margin-right: auto;
            font-size:1rem;
           
         }

    </style>


<script src="js/jq.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="index.html" class="logo"> </a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="hos_dash.php"><span class="fa fa-h-square"></span> Profile</a>
          </li>
          <li>
              <a href="hos_dash_app.php"><span class="fa fa-calendar"></span>Appointment</a>
          </li>
          <li>
            <a href="hos_dash_doc.php"><span class="fa fa-user-md"></span>Doctor</a>
          </li>
          <li>
            <a href="hos_dash_pat.php"><span class="fa fa-wheelchair"></span> Patient</a>
          </li>
          <!-- <li>
            <a href="#"><span class="fa fa-paper-plane"></span> Contacts</a>
          </li> -->
        </ul>

        <div class="footer">
        	<p>
					  Copyright &copy;abdullahcreation
					</p>
        </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <!-- <a class="nav-link" href="#">Home</a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">About</a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Portfolio</a> -->
                </li>
                <form action="" method="post">
                <li class="nav-item">
                    <input type="submit" value="LOGOUT" name="logout" class="nav-link" />
                </li>
                </form>
              </ul>
            </div>
          </div>
        </nav>


 


        <h2 class="mb-4"> <?php echo strtoupper($n);?></h2>

<!-- Form for add Doctor into the Hospital  -->
        <div>
          <form action="" method="post">
          <label style="padding: 10px 10px 10px 0px;">Enter Doctor Id </label><input type="number" name="do_id" class="form-control">
          <br>
          <div class="text-center">
          <input id="bbt" value="Add Doctor" name="enter-doc" type="submit" class="btn btn-primary " style="padding: auto 50px auto 50px;">
          <input id="bbt" value="Remove Doctor" name="remove-doc" type="submit" class="btn btn-primary " style="padding: auto 50px auto 50px;">
        </div>
        <br><br>
          </form>
        </div>
<!-- ---------------------------------------- -->
     <!-- php code for add doctor into the hospital -->

  
     <?php

if(isset($_POST['enter-doc']))
{
  if(!empty($_POST['do_id'])){
      $dname = $_POST['do_id'];
      $d_sql = "UPDATE `doctor` SET `hos_id`=$i WHERE doctor_id=$dname ";
      $connect= mysqli_query($con, $d_sql);
      if(mysqli_affected_rows($con))
      {
        echo '<script>alert("Doctor added Successfully")</script>';
       
        
      }else{
        echo '<script>alert("Invalid doctor Id")</script>';
      }
    }
    else{
      echo '<script>alert("Plz Enter Doctor ID")</script>';
    }   

}

if(isset($_POST['remove-doc']))
{
  if(!empty($_POST['do_id'])){
      $dname = $_POST['do_id'];
      $r_sql = "UPDATE `doctor` SET `hos_id`=null WHERE doctor_id=$dname ";
      $connect = mysqli_query($con, $r_sql);
      // $aff_row = affected_rows($r_sql);
      if(mysqli_affected_rows($con))
      {
        echo '<script>alert("Doctor Removed Successfully")</script>';
        
      }else{
        echo '<script>alert("Invalid doctor Id")</script>';
      }
    }else{
      echo '<script>alert("Plz Enter Doctor ID")</script>';
    }
}


?>


      <!-- ------------------------------------------ -->

        <table width="100%">

        <tr>
          <th>S.NO</th>
          <th>Doctor ID</th>
          <th>Doctor Name</th>
          <th>Gender</th>
          <th>Specialization</th>
          <th>Designation</th>
        </tr>


        <?php
        
        $no=0;
        while($r1= mysqli_fetch_assoc($r2))
        {
          
          echo "<tr>  <td>".++$no ."</td>  ";    
            
          echo "  <td>".$r1['doctor_id'] ."</td>";

          echo" <td>".$r1['doctor_name']."</td>";   
          
          echo "  <td>".$r1['gender']." </td>  ";
        
          echo "  <td>".$r1['specialist']." </td>  ";
          
          echo " <td>".$r1['education']." </td></tr> ";

          
        }
        
        ?>



        </table>
       
         </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>



<?php
if(isset($_POST['logout']))
{
  session_destroy();
  header('location:hos_dash_doc.php');
}

?>