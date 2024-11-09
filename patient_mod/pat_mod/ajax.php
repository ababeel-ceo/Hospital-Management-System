

<?php 
include_once '../../db.php';
if($_POST['id']){
	$id=$_POST['id'];
	if($id==0){
		echo "<option>Select Doctor</option>";
		}else{
			$sql = mysqli_query($con,"SELECT * FROM `doctor` WHERE hos_id='$id'");
			while($row = mysqli_fetch_array($sql)){
				echo '<option value="'.$row['doctor_id'].'">'.$row['doctor_name'].'</option>';
				}
			}
		}
?>