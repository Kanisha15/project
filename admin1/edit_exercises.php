<?php 
include
 ("config.php");

if (isset($_GET['edit_exercise'])) {
	$edit_exercise_id=$_GET['edit_exercise'];

	$sel_exercise="SELECT * FROM exercises WHERE exercise_id='$edit_exercise_id'";
	$run_exercise=mysqli_query($con, $sel_exercise);
	$row_exercise=mysqli_fetch_array($run_exercise);
	$exercise_up_id=$row_exercise['exercise_id'];
	$exercise_name=$row_exercise['exercise_name'];
	$exercise_day=$row_exercise['exercise_day'];
	$exercise_image=$row_exercise['exercise_image'];
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
			<td align="right"><b>Name Of Exercise</b></td>
			<td><input type="text" name="exercise_name" ></td>
			</tr>
			<tr>
				<td align="right"><b>day of exercise</b></td>
				<td>
				<select name="exercise_day" class="form-control"required>
					<option value="">--Please Select--</option>
					<option value="SUNDAY">SUNDAY</option>
					<option value="MONDAY">MONDAY</option>
                    <option value="TUSEDAY">TUSEDAY</option>
					<option value="WEDENSDAY">WEDENSDAY</option>
					<option value="THRUSDAY">THRUSDAY</option>
					<option value="FRIDAY">FRIDAY</option>
					<option value="SATUARDAY">SATUARDAY</option>

				</select></td>
			</tr>
			<tr>
				<td align="right"><b>Exercise Image</b></td>
				<td><input type="file" name="exercise_image"><br><img src="exercise_images/<?php echo $exer_image; ?>" width="30" height="14"></td>
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
	    
		$exercise_name= $_POST['exercise_name'];
		$exercise_day= $_POST['exercise_day'];
	

		//  Image Name
		$exercise_image= $_FILES['exercise_image']['name'];

		//Images Temp Name
		$temp_name= $_FILES['exercise_image']['tmp_name'];

		//Validations
		if ($exercise_name=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($exercise_day=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($exercise_image=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

			move_uploaded_file($temp_name, "exercise_images/$exercise_image");

			//Query For Inserting Workout Into Database.....
			$update_exercise = "UPDATE exercises SET exercise_name='$exercise_name', exercise_day='$exercise_day', exercise_image='$exercise_image' WHERE exercise_id='$exercise_up_id'";
			$run_update = mysqli_query($con, $update_exercise);
			if ($run_update) {
				echo "<script>alert('Exercise Updated')</script>";
				echo "<script>window.open('dashboard1.php?view_exercises','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>