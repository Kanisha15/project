<?php 

include ("config.php");

if (isset($_GET['edit_tran'])) {
	$edit_trainer_id=$_GET['edit_tran'];


	$sel_trainer="SELECT * FROM trainer WHERE trainer_id='$edit_trainer_id'";
	$run_trainer=mysqli_query($con, $sel_trainer);
	$row_trainer=mysqli_fetch_array($run_trainer);
	$trainer_up_id=$row_trainer['trainer_id'];
	$trainer_fname=$row_trainer['trainer_fname'];
	$trainer_lname=$row_trainer['trainer_lname'];
	$trainer_email=$row_trainer['trainer_email'];
	$trainer_joiningdate=$row_trainer['trainer_joiningdate'];
	$trainer_package=$row_trainer['trainer_package'];
	$trainer_gender=$row_trainer['trainer_gender'];
	$trainer_contactno=$row_trainer['trainer_contactno'];
}

?>
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
	<title> Update Trainers</title>
</head>
<body bgcolor="#999999">
<form method="post" action="" enctype="multipart/form-data">
<?php 
if(isset($_POST['update_trainer']))
{
extract($_POST);
if(strlen($trainer_fname)<2){ // Minimum 
	 $error[] = 'Please enter First Name using 2 charaters atleast.';
	   }
if(strlen($trainer_fname)>20){  // Max 
	 $error[] = 'First Name: Max length 20 Characters Not allowed';
	   }
  if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $trainer_fname)){
		   $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
	   }    
 if(strlen($trainer_lname)<3){ // Minimum 
	 $error[] = 'Please enter Last Name using 3 charaters atleast.';
	   }
if(strlen($trainer_lname)>20){  // Max 
	 $error[] = 'Last Name: Max length 20 Characters Not allowed';
	   }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $trainer_lname)){
		   $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
			 }    
if(strlen($trainer_email)>50){  // Max 
		   $error[] = 'Email: Max length 50 Characters Not allowed';
}
if(!filter_var($trainer_email,FILTER_VALIDATE_EMAIL)) 
	   $error[] = 'invalid EMAIL'; 

 if(!preg_match("/^([0-9]{10})$/",$trainer_contactno))
		 $error[] = 'please enter 10 digit number only';
	   
 else  if(!preg_match("/^[6-9]\d{9}$/",$trainer_contactno))
	   $error[]='start the number in valid format';


 if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $trainer_joiningdate)) {
	   $currentDate = date("Y-m-d");
   
 if ($trainer_joiningdate !== $currentDate) {
	 $error[]= "please enter the current date";
	  } 
	 } 
 if(!isset($error)){ 
		$date=date('Y-m-d');
	
     $update_trainer = "UPDATE trainer SET trainer_fname='$trainer_fname',trainer_lname='$trainer_lname',trainer_email='$trainer_email',trainer_contactno='$trainer_contactno',trainer_gender='$trainer_gender',trainer_package='$trainer_package',trainer_joiningdate='$trainer_joiningdate' WHERE trainer_id='$trainer_up_id'";
     $run_update = mysqli_query($con, $update_trainer);
    
	 if($run_update)
    {
   $done=2; 
}
else{
$error[] ='Failed : Something went wrong';
}
}
 } 
?>
<tr>
 <?php 

 if(isset($error)){ 
foreach($error as $error){ 
  echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; 
}
}
?>
</tr>
<div>
      <?php if(isset($done)) 
      { ?>
    <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> update trainer successfully . <br> <a href="dd1.php" style="color:#fff;">dashboard here... </a> </div>
      <?php } else { ?>


		<table width="950px" align="center" border="5" bgcolor="#f1533e">
	<tr>
	<td colspan="2" align="center"><h1>update or edit Trainer</h1></td>
	</tr>
	<tr>
	<td align="right"><b>Trainer first name</b></td>
	<td><input type="text" name="trainer_fname" value="<?php if(isset($error)){ echo $_POST['trainer_fname'];}?>" required="">
	</td>
			</tr>
			<tr>
				<td align="right"><b>Trainer last name</b></td>
				<td><input type="text" name="trainer_lname" value="<?php if(isset($error)){ echo $_POST['trainer_lname'];}?>" required="">
				</td>
			</tr>
            <tr>
				<td align="right"><b>Trainer email</b></td>
				<td><input type="email" name="trainer_email" value="<?php if(isset($error)){ echo $_POST['trainer_email'];}?>" required="">
				</td>
             </tr>

			<tr>
				<td align="right"><b>Trainer contactno</b></td>
				<td><input type="text" name="trainer_contactno" maxlength="10" value="<?php if(isset($error)){ echo $_POST['trainer_contactno'];}?>" required="">
				</td>
			</tr>
            <tr>
				<td align="right"><b>Trainer joiningdate</b></td>
				<td><input type="date" name="trainer_joiningdate" value="<?php if(isset($error)){ echo $_POST['trainer_joiningdate'];}?>" required="">
				</td>
			</tr>
			<tr>
				<td align="right"><b>Trainer package</b></td>
				<td>
				<select name=" trainer_package" class="form-control" required>
        <option value="">--Please Select--</option>
        <option value="Basic(under 3000)">Basic (under 3000)</option>
        <option value=" Standard (above 3000)">Standard(above 3000)</option>
        <option value="premium (above 5000)">Premium (above 5000)</option>
    </select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>trainer gender</b></td>
				<td>
				<select name="trainer_gender" class="form-control"required>
					<option value="">--Please Select--</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
                    <option value="other">other</option>
				</select>
				</td>
			</tr>
			<tr>
			<td colspan="2" align="center"><input type="submit" name="update_trainer" value="Update Trainer"></td>
			</tr>
		</table>
	</form>
	<?php } ?> 
</body>
</html>

