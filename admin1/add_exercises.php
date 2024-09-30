<?php 

include ("config.php");

?>
<html>
<head>
	<title> Add Exercises</title>
</head>
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
<body bgcolor="#999999">
	<form method="post" action="add_exercises.php" enctype="multipart/form-data">
		<table width="950px" align="center" border="6" bgcolor="#f1533e">
			<tr>
				<td colspan="3" align="center"><h1>Insert Exercises</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Name Of Exercise</b></td>
				<td><input type="text" name="exercise_name"></td>
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
				<td><input type="file" name="exercise_image"></td>
			</tr>
			<tr>
				<td colspan="4" align="center"><input type="submit" name="insert_workout" value="Assign Workout"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['insert_workout']))
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
			$insert_exercise = "insert into exercises(exercise_name, exercise_day ,exercise_image) values('$exercise_name','$exercise_day','$exercise_image')";
			$run_exercise = mysqli_query($con, $insert_exercise);
			if ($run_exercise) {
				echo "<script>alert('Exercise Inserted')</script>";
				echo "<script>window.open('dashboard1.php?add_exercises','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>