<?php 
include_once('config.php');
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
	<title>MyGym | View Users</title>
<style type="text/css">
	table{
		background-color: white;
	}
	tr,th{
		border: 2px solid black;
	} 
</style>
</head>
<body>
	<table align="center" width="1220" style="color:black;">
		<tr align="center">
			<td colspan="6"><h2>View All User</h2><br></td>
		</tr>
		<tr>
			<th>User No</th>
			<th>user id</th>
			<th>User FName</th>
			<th>User lname</th>
			<th>User email</th>
			<th>User address</th>
			<th>User contactno</th>
            <th>User gender</th>
            <th>User joiningdate</th>
            <th>User dateofbirth</th>
            <th>User package</th>

			<th>Delete</th>
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
			<td><?php echo $id; ?></td>
			<td><?php echo $fname; ?></td>
			<td><?php echo $lname; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $address; ?></td>
			<td><?php echo $contactno; ?></td>
            <td><?php echo $gender; ?></td>
            <td><?php echo $joiningdate; ?></td>
            <td><?php echo $dateofbirth; ?></td>
            <td><?php echo $package; ?></td>
            <td><a href="delete_member.php?delete_member=<?php echo $id;?>"onClick="return confirm ('do yo really want to delete');"><i class="fa fa-trash"aria-hidden="true"></i>Delete</a></td>   
		</tr>
		<?php } ?>
	</table>
</body>
</html>