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
	<title>MyGym | View Exercises</title>
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
			<td colspan="6"><h2>View All Equipment</h2><br></td>
		</tr>
		<tr>
			<th>Equipment No</th>
			<th>Equipment Name</th>
            <th>Equipment description</th>
			<th>Equipment Image</th>
            
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
		$i=0;
			$sel_equipment="SELECT * FROM equipment";
			$run_equipment=mysqli_query($con, $sel_equipment);
			while ($row_equipment=mysqli_fetch_array($run_equipment)) {
				$equipment_id=$row_equipment['equipment_id'];
				$equipment_name=$row_equipment['equipment_name'];
                $equipment_description=$row_equipment['equipment_description'];
				$equipment_image=$row_equipment['equipment_image'];
                


				$i++;
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $equipment_name; ?></td>
            <td><?php echo $equipment_description; ?></td>
			<td><img src="equipment_images/<?php echo $equipment_image; ?>" width="130" height="100"></td>
			<td><a href="edit_equipment.php?edit_equipment=<?php echo $equipment_id; ?>">Edit</a></td>
			<td><a href="delete_equipment.php?delete_equipment=<?php echo $equipment_id; ?> "onClick="return confirm ('do yo really want to delete');"><i class="fa fa-trash"aria-hidden="true"></i>Delete</a></td> 
		</tr>
		<?php } ?>
            </table>
</body>
</html>