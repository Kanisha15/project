<?php 
include
 ("config.php");?>
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
	<title>MyGym | View Trainers</title>
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
	<table align="center" width="1000" style="color:black;">
		<tr align="center">
			<td colspan="6"><h2>View All Trainers</h2><br></td>
		</tr>
		<tr>
		    <th>Trainer no</th>
			<th>Trainer Fname</th>
			<th>Trainer LName</th>
			<th>Trainer Email</th>
			<th>Trainer Contactno</th>
			<th>Trainer joiningdate</th>
			<th>Trainer gender</th>
			<th>Trainer package</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
		$i=0;
			$sel_trainer="SELECT * FROM trainer";
			$run_trainer=mysqli_query($con, $sel_trainer);
			while ($row_trainer=mysqli_fetch_array($run_trainer)) {
				$trainer_id=$row_trainer['trainer_id'];
				$trainer_fname=$row_trainer['trainer_fname'];
				$trainer_lname=$row_trainer['trainer_lname'];
				$trainer_email=$row_trainer['trainer_email'];
				$trainer_joiningdate=$row_trainer['trainer_joiningdate'];
				$trainer_package=$row_trainer['trainer_package'];
				$trainer_gender=$row_trainer['trainer_gender'];
				$trainer_contactno=$row_trainer['trainer_contactno'];

				$i++;
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
            <td><?php echo $trainer_fname; ?></td>
			<td><?php echo $trainer_lname; ?></td>
			<td><?php echo $trainer_email; ?></td>
			<td><?php echo $trainer_joiningdate; ?></td>
			<td><?php echo $trainer_package; ?></td>
			<td><?php echo $trainer_gender; ?></td>
			<td><?php echo $trainer_contactno; ?></td>
			<td><a href="edit_tran.php?edit_tran=<?php echo $trainer_id; ?>">Edit</a></td>
			<td><a href="delete_trainer.php?delete_trainer=<?php echo $trainer_id; ?>"onClick="return confirm ('do yo really want to delete');"><i class="fa fa-trash"aria-hidden="true"></i>Delete</a></td>
			  
		</tr>
		<?php } ?>
	</table>
			</div>
			</div>
</body>
</html>