<?php 

include ("config.php");

	if (isset($_GET['delete_equipment'])) {
		$delete_id=$_GET['delete_equipment'];

		$delete_equipment="DELETE FROM equipment WHERE equipment_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_equipment);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('dashboard1.php?view_equipment','_self')</script>";
		}

	}

?>