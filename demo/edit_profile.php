<?php 

require_once ("config.php");

if (isset($_SESSION["login_sess"])) {
	


	$sel_member="SELECT * FROM member WHERE id='$edit_member_id'";
	$run_member=mysqli_query($dbc, $sel_member);
	$row_member=mysqli_fetch_array($run_member);
	$up_id=$row_member['id'];
	$fname=$row_member['fname'];
	$lname=$row_member['lname'];
	$email=$row_member['email'];
	$package=$row_member['package'];
	$contactno=$row_member['contactno'];
}

?>
 <!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
<form method="post" action="" enctype="multipart/form-data">
<?php 
if(isset($_POST['update_member']))
{
extract($_POST);
if(strlen($fname)<2){ // Minimum 
	 $error[] = 'Please enter First Name using 2 charaters atleast.';
	   }
if(strlen($fname)>20){  // Max 
	 $error[] = 'First Name: Max length 20 Characters Not allowed';
	   }
  if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)){
		   $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
	   }    
 if(strlen($lname)<3){ // Minimum 
	 $error[] = 'Please enter Last Name using 3 charaters atleast.';
	   }
if(strlen($lname)>20){  // Max 
	 $error[] = 'Last Name: Max length 20 Characters Not allowed';
	   }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)){
		   $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
			 }    
if(strlen($email)>50){  // Max 
		   $error[] = 'Email: Max length 50 Characters Not allowed';
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) 
	   $error[] = 'invalid EMAIL'; 

 if(!preg_match("/^([0-9]{10})$/",$contactno))
		 $error[] = 'please enter 10 digit number only';
	   
 else  if(!preg_match("/^[6-9]\d{9}$/",$contactno))
	   $error[]='start the number in valid format';

 if(!isset($error)){ 
		$date=date('Y-m-d');
	
  $update_member ="UPDATE member SET fname='$fname',lname='$lname',email='$email',contactno='$contactno',package='$package' WHERE email = '$email' ";
  $run_update = mysqli_query($dbc, $update_member);
    
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
     <?php 
    
     if(isset($error)){ 
    foreach($error as $error){ 
      echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; 
    }
    }
    ?>
     <form method="post" enctype='multipart/form-data' action="">
          <div class="row">
            <div class="col"></div>
           <div class="col-6"> 
            <h3>EDIT MY PROFILE </h3>
           </div>
           <br></br>
            <div class="col"><p><a href="logout.php"><span style="color:red;">Logout</span> </a></p>
         </div>
          </div>
          <div class="form-group">
    
    <label class="label_txt">First Name</label>
<input type="text" class="form-control" name="fname" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" required="">
</div>
<div class="form-group">
<label class="label_txt">Last Name </label>
<input type="text" class="form-control" name="lname" value="<?php if(isset($error)){ echo $_POST['lname'];}?>" required="">
</div>

<div class="form-group">
<label class="label_txt">address </label>
<input type="text" class="form-control" name="address" value="<?php if(isset($error)){ echo $_POST['address'];}?>" required="">
</div>

<div class="form-group">
<label class="label_txt">Email </label>
<input type="email" class="form-control" name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required="">
</div>
<div class="form-group">
<label class="label_txt">Password </label>
<input type="password" name="password" class="form-control" required="">
</div>
<div class="form-group">
<label class="label_txt">Confirm Password </label>
<input type="password" name="passwordConfirm" class="form-control" required="">
</div>
<div class="form-group">
<label class="label_txt">contact no</label>
<input type="text" name="contactno" maxlength="10" class="form-control" value="<?php if(isset($error)){ echo $_POST['contactno'];}?>" required="">
</div>

<label for="dateOfBirth">date of birth:</label>
<input type="date" name="dateOfbirth"class="form-control" value=" max="<?php echo date('Y-m-d', strtotime('-16 years'));?>  required >

<div class="form-group">
<label for="package">Package:</label>
<select name="package" class="form-control" required>
    <option value="">--Please Select--</option>
    <option value="Basic(under 3000)">Basic (under 3000)</option>
    <option value="Standard(above 3000)">Standard(above 3000)</option>
    <option value="Premiun(above 5000)">Premium (above 5000)</option>
</select>
</div>
<div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
<button  class="btn btn-success" name="update_member">Save Profile</button>
            </div>
           </div>
       </form>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
