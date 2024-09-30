<?php 
include
 ("config.php");

if (isset($_GET['edit_equipment'])) {
	$edit_equipment_id=$_GET['edit_equipment'];

	$sel_equipment="SELECT * FROM equipment WHERE equipment_id='$edit_equipment_id'";
	$run_equipment=mysqli_query($con, $sel_equipment);
	$row_equipment=mysqli_fetch_array($run_equipment);
	$equipment_up_id=$row_equipment['equipment_id'];
	$equipment_name=$row_equipment['equipment_name'];
	$euipment_description=$row_equipment['equipment_description'];
	$equipment_image=$row_equipment['equipment_image'];
}
?>
<html>
<head>
<body class="sb-nav-fixed">
   <?php include_once('navbar.php');?>
   <br></br>
        <div id="layoutSidenav">
          <?php include_once('sidebar.php');?>
            <div id="layoutSidenav_content">
			<style>
            body {
                background-image: url(bg.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>
	<title>MyGym | Edit Exercises</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Edit or Update Exercises</h1></td>
			</tr>
			<tr>
			<td align="right"><b>Name Of Equipment</b></td>
			<td><input type="text" name="equipment_name" ></td>
			</tr>
			<tr>
			<td align="right"><b>Equipment description</b></td>
			<td><input type="text" name="equipment_description" ></td>
			</tr>
		
			<tr>
				<td align="right"><b>Equipment Image</b></td>
				<td><input type="file" name="equipment_image"><br><img src="exercise_images/<?php echo $equipment_image; ?>" width="30" height="14"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update_workout" value="Update Workout"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['update_workout']))
	{

		//Text Data Variables
	    
		$equipment_name= $_POST['equipment_name'];
		$equipment_description= $_POST['equipment_description'];
	

		//  Image Name
		$equipment_image= $_FILES['equipment_image']['name'];

		//Images Temp Name
		$temp_name= $_FILES['equipment_image']['tmp_name'];

		//Validations
		if ($equipment_name=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($equipment_description=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($equipment_image=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

			move_uploaded_file($temp_name, "exercise_images/$equipment_image");

			//Query For Inserting Workout Into Database.....
			$update_equipment = "UPDATE equipment SET equipment_name='$equipment_name', equipment_description='$equipment_description', equipment_image='$equipment_image' WHERE equipment_id='$equipment_up_id'";
			$run_update = mysqli_query($con, $update_equipment);
			if ($run_update) {
				echo "<script>alert('Equipment Updated')</script>";
				echo "<script>window.open('dd1.php?view_equipment','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>