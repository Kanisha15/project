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
			<td colspan="6"><h2>View All Exercises</h2><br></td>
		</tr>
		<tr>
			<th>Exercise No</th>
			<th>Exercise Name</th>
            <th>Exercise Day</th>
			<th>Exercise Image</th>
            
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
		$i=0;
			$sel_exercise="SELECT * FROM exercises";
			$run_exercise=mysqli_query($con, $sel_exercise);
			while ($row_exercise=mysqli_fetch_array($run_exercise)) {
				$exercise_id=$row_exercise['exercise_id'];
				$exercise_name=$row_exercise['exercise_name'];
                $exercise_day=$row_exercise['exercise_day'];
				$exercise_image=$row_exercise['exercise_image'];
                


				$i++;
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $exercise_name; ?></td>
            <td><?php echo $exercise_day; ?></td>
			<td><img src="exercise_images/<?php echo $exercise_image; ?>" width="130" height="100"></td>
			<td><a href="edit_exercises.php?edit_exercise=<?php echo $exercise_id; ?>">Edit</a></td>
			<td><a href="delete_exercise.php?delete_exercise=<?php echo $exercise_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
            </table>
</body>
</html>