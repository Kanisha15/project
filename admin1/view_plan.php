<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
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
	    <table align="center" width="930" style="color:black;">
		<tr align="center">
		<td colspan="6"><h2>MANAGE PLAN</h2><br></td>
		</tr>
				<tr>
					<th>S.No</th>
					<th>Plan ID</th>
					<th>Plan name</th>
					<th>Plan Details</th>
					<th>Months</th>
					<th>Rate</th>
					<th>Action</th>
				</tr>		
				<tbody>
					<?php


					$query  = "select * from plan where active='yes'";
					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) {
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					        $msgid = $row['plid'];
					        
					        echo "<tr><td>" . $sno . "</td>";
					        echo "<td>" . $row['plid'] . "</td>";
					        echo "<td>" . $row['plname'] . "</td>";
					        echo "<td width='380'>" . $row['pldescription'] . "</td>";
					        echo "<td>" . $row['plvalidity'] . "</td>";
					        echo "<td>" . $row['plamount'] . "</td>" ;
							$sno++;
					        
					        
							$msgid = 0;
					    }
					    
					}

					?>	
					</table>															
				</tbody>
		</table>

    	

    </body>
</html>


