<?php 
include_once('config.php');
?>

<html>
<head>
	<title>MyGym | View Users</title>
<style type="text/css">
	table{
		background-color: darkgrey;
	}
	tr,th{
		border: 2px solid white;
	}
</style>
</head>
<body>
	<table align="center" width="1000" style="color:white;">
		<tr align="center">
			<td colspan="6"><h2>View All User</h2><br></td>
		</tr>
		<tr>
			<th>User No</th>
			<th>User FName</th>
			<th>User lname</th>
			<th>User email</th>
			<th>User address</th>
			<th>User contactno</th>
            <th>User gender</th>
            <th>User joiningdate</th>
            <th>User dateofbirth</th>
            <th>User package</th>

			<th>Action</th>
            <th>view</th>

		</tr>
		<?php 
		$i=0;
			$sel_member="SELECT * FROM member";
			$run_member=mysqli_query($con, $sel_member);
			while ($row_member=mysqli_fetch_array($run_member)) {
                $id=$row_member['id'];
				$fname=$row_member['fname'];
                $lname=$row_member['lname'];
				$email=$row_member['email'];
				$address=$row_member['address'];
				$contactno=$row_member['contactno'];
				$gender=$row_member['gender'];
				$joiningdate=$row_member['joiningdate'];
				$dateofbirth=$row_member['dateofbirth'];
				$package=$row_member['package'];
                

				$i++;
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $fname; ?></td>
			<td><?php echo $lname; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $address; ?></td>
			<td><?php echo $contactno; ?></td>
            <td><?php echo $gender; ?></td>
            <td><?php echo $joiningdate; ?></td>
            <td><?php echo $dateofbirth; ?></td>
            <td><?php echo $package; ?></td>
            <td><form action='take_attendance.php' method='post'>
			<input type='submit' class='a1-btn a1-blue'  value='TAKE ATTENDANCE ' width="120px" height="100px" class='btn btn-info'/></form></td></tr>
								
		<?php } ?>
	</table>
</body>
</html>