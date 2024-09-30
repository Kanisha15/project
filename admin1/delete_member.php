<?php 

include ("config.php");

	if (isset($_GET['delete_member'])) {
		$delete_id=$_GET['delete_member'];

		$delete_member="DELETE FROM member WHERE id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_member);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('view_user.php?view_users','_self')</script>";
		}

	}

?>