<?php 

include ("config.php");

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
	<title> Add attendance</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="take_attendance.php" enctype="multipart/form-data">
		<table width="900px" height="300px" align="center" border="6" bgcolor="#f1533e">
			<tr>
				<td colspan="3" align="center"><h3>ATTENDANCE OF THE USER</h3></td>
			</tr>
			<tr>
				<td align="right"><b>Select User</b></td>
				<td>
					<select name="member">
						<option>Select a User</option>
						<?php
						$get_member="SELECT * FROM member";
						$run_member=mysqli_query($con, $get_member);
						while($row_member=mysqli_fetch_array($run_member)){
							$id=$row_member['id'];
							$email=$row_member['email'];
							echo "<option value='$id'>$email</option>";
						}
					?>
					</select>
				</td>
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
		$email= $_POST['member'];
		$attendance_date= $_POST['attendance_date'];
		$attendance_status= $_POST['attendance_status'];
		
		//Validations
		if ($attendance_date=='')    {
            
              echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
               } 

		 elseif($email==''){
				echo "<script>alert('Please Fill All The Fields!')</script>";
				exit();
		 }
    
		  elseif ($attendance_status=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
    
		
			//Query For Inserting Workout Into Database.....
			$insert_attendance = "insert into attendance (id,attendance_date, attendance_status) values('$email','$attendance_date','$attendance_status')";
			$run_attendance = mysqli_query($con, $insert_attendance);
			if ($run_attendance) {
				echo "<script>alert('attendance Inserted')</script>";
				echo "<script>window.open('dashboard1.php?take_attendance','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
  
              }      
?>