<?php 

include ("config.php");

	if (isset($_GET['delete_trainer'])) {
		$delete_id=$_GET['delete_trainer'];

		$delete_trainer="DELETE FROM trainer WHERE trainer_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_trainer);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('view_trainers.php?view_trainers','_self')</script>";
		}

	}

?>