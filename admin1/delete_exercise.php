<?php 

include ("config.php");

	if (isset($_GET['delete_exercise'])) {
		$delete_id=$_GET['delete_exercise'];

		$delete_exercise="DELETE FROM exercises WHERE exercise_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_exercise);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('dd1.php?view_exercises','_self')</script>";
		}

	}

?>