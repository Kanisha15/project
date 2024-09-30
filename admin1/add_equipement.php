<?php 

include ("config.php");

?>
<html>
<head>
	<title> Add EQUIPMENT</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="add_exercises.php" enctype="multipart/form-data">
		<table width="1000px" align="center" border="6" bgcolor="#f1533e">
			<tr>
				<td colspan="3" align="center"><h1>Insert Exercises</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Name Of Equipment</b></td>
				<td><input type="text" name="equipment_name"></td>
			</tr>
			<tr>
				<td height="44" align="right"><b> Equipment description</b></td>
				<td><input type="text" name="equipment_name"></td>
			</tr>
			
	
			<tr>
				<td align="right"><b>Equipment Image</b></td>
				<td><input type="file" name="equipment_image"></td>
			</tr>
			<tr>
				<td colspan="5" align="center"><input type="submit" name="insert_workout" value="Assign Workout"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['insert_workout']))
	{

		//Text Data Variables
		
		$exercise_name= $_POST['equipment_name'];
		$exercise_day= $_POST['equipment_description'];
		


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

			move_uploaded_file($temp_name, "equipment_images/$equipment_image");

			//Query For Inserting Workout Into Database.....
			$insert_equipement = "insert into equipement (equipement_name, equipement_description ,equipement_image) values('$equipement_name','$equipement_description','$equipement_image')";
			$run_equipement = mysqli_query($con, $insert_equipement);
			if ($run_equipement) {
				echo "<script>alert('equipement Inserted')</script>";
				echo "<script>window.open('dd1.php?add_equipement','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>