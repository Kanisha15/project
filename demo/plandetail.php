<?php
require_once("config.php");
$plid=$_GET['q'];
$query="select * from plan where plid='".$plid."'";
$res=mysqli_query($dbc,$query);
if($res){
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	// echo "<tr><td>".$row['plamount']."</td></tr>";
	echo "<tr>
		<td height='35'>AMOUNT:</td>
		<td height='35'>&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input id='boxx' type='text' value='".$row['plamount']."' readonly></td></tr>
		<tr>
		<td height='35'>VALIDITY:</td>
		<td height='35'>&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type='text' id='boxx' value='".$row['plvalidity']." Month' readonly></td>
		</tr>
		<tr>
		<td height='35'>DESCRIPTION:</td>
		<td height='65'>&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type='text' id='boxx' value='".$row['pldescription']."' readonly></td>
		</tr>
	";
}

?>