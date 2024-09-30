<?php 

include ("config.php");

	if (isset($_GET['del_plan'])) {
		$del_id=$_GET['del_plan'];

		$del_plan="DELETE FROM plan WHERE plid='$del_id'";
		$run_delete=mysqli_query($con,$del_plan);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('view_trainers.php?view_trainers','_self')</script>";
		}

	}

?>