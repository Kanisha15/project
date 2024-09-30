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
	<title>MyGym | View attendance</title>
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
	<table align="center" width="794" style="color:black;">
		<tr align="center">
			<td colspan="6"><h2>View All attendance</h2><br></td>
		</tr>
		<tr>
			<th>attendance no</th>
			<th>attendance date</th>
			<th>attendance status</th>
			<th>User id</th>
			<th>Edit</th>
		</tr>
		<?php 
		$i=0;
			$sel_attendance="SELECT * FROM attendance";
			$run_attendance=mysqli_query($con, $sel_attendance);
			while ($row_attendance=mysqli_fetch_array($run_attendance)) {
				$attendance_id=$row_attendance['attendance_id'];
				$attendance_date=$row_attendance['attendance_date'];
                $attendance_status=$row_attendance['attendance_status'];
	            $id=$row_attendance['id'];
				

				$i++;
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $attendance_date; ?></td>
            <td><?php echo $attendance_status; ?></td>
			<td><?php echo $id ;?></td>
			
			<td><a href="edit_attendance.php?edit_attendance=<?php echo $attendance_id; ?>">Edit</a></td>
		</tr>
		<?php } ?>
            </table>
</body>
</html>