<?php 
include
 ("config.php");

if (isset($_GET['edit_attendance'])) {
	$edit_attendance_id=$_GET['edit_attendance'];

	$sel_attendance="SELECT * FROM attendance WHERE attendance_id='$edit_attendance_id'";
	$run_attendance=mysqli_query($con, $sel_attendance);
	$row_attendance=mysqli_fetch_array($run_attendance);
	$attendance_up_id=$row_attendance['attendance_id'];
	$attendance_date=$row_attendance['attendance_date'];
	$attendance_status=$row_attendance['attendance_status'];
	
}
?>
<html>
<head>
	<title>MyGym | Edit attendence</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="" enctype="multipart/form-data">
		<table width="1000px" height="400px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>edit attendance</h1></td>
			</tr>
			<tr>
				<td align="right"><b>date of attendance</b></td>
				<td><input type="date" name="attendance_date"></td>
			</tr>
			<tr>
				<td align="right"><b>status of attendance</b></td>
				<td>
				<select name="attendance_status" class="form-control"required>
					<option value="">--Please Select--</option>
					<option value="Present">Present</option>
					<option value="Absent">Absent</option>
    
				</select></td>
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
	    
		$attendance_date= $_POST['attendance_date'];
		$attendance_status= $_POST['attendance_status'];

		//Validations
		if ($attendance_date=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		
		elseif ($attendance_status=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}


			//Query For Inserting Workout Into Database.....
			$update_attendance = "UPDATE attendance SET attendance_date='$attendance_date',attendance_status='$attendance_status' WHERE attendance_id='$attendance_up_id'";
			$run_update = mysqli_query($con, $update_attendance);
			if ($run_update) {
				echo "<script>alert('attendance Updated')</script>";
				echo "<script>window.open('dd1.php?view_attendance','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
?>