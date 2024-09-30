<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head>
<title>select plan </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 

</head>
<body>
<?php 
      include "dashbord.php";
    ?>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
     <div class="col-sm-4">
</div> 
     <div class="col-sm-4">
    </div>
  </div>
	<div class="row">
<?php 
 if(isset($_POST['signup']))
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


  if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $joiningDate)) {
        $currentDate = date("Y-m-d");
    
  if ($joiningDate !== $currentDate) {
      $error[]= "please enter the current date";
       } 
      }


  if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $dateOfBirth)) {
      $currentDate = date("Y-m-d");
      $minAge = 16;

      $diff = date_diff(date_create($dateOfBirth), date_create($currentDate));
      $age = $diff->y;

    if ($age <= $minAge) {
      $error[]= "You must be at least 16 years old.";
    } 
  }
            
   if($passwordConfirm ==''){
          $error[] = 'Please confirm the password.';
      }
   if($password != $passwordConfirm){
          $error[] = 'Passwords do not match.';
      }
    if(strlen($password)<5){ // min 
            $error[] = 'The password is 6 characters long.';
        }  
     if(strlen($password)>20){ // Max 
            $error[] = 'Password: Max length 20 Characters Not allowed';
        }
        
      $sql="select *from member where (email='$email')";
         $res=mysqli_query($dbc,$sql);
        if (mysqli_num_rows($res) > 0) {
         $row = mysqli_fetch_assoc($res);

        if($email==$row['email'])
       {
            $error[] ='Email alredy Exists.';
          } 
      }
         if(!isset($error)){ 
              $date=date('Y-m-d');
            $options = array("cost"=>4);
         $password = password_hash($password,PASSWORD_BCRYPT,$options);
            
            $result = mysqli_query($dbc,"INSERT into member(fname,lname,email,password,dateOfBirth,address,contactno,joiningDate,package,gender) values('$fname','$lname','$email','$password','$dateOfBirth','$address','$contactno','$joiningDate','$package','$gender')");

           if($result)
    {
     $done=2; 
    }
    else{
      $error[] ='Failed : Something went wrong';
    }
 }
 } ?>

		 <div class="col-sm-4">
     
 <?php 

 if(isset($error)){ 
foreach($error as $error){ 
  echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; 
}
}
?>
		</div>
		<div class="col-sm-4">
      <?php if(isset($done)) 
      { ?>
    <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . <br> <a href="login.php" style="color:#fff;">Login here... </a> </div>
      <?php } else { ?>
       <div class="signup_form">
		<form action="" method="POST">
    <h1>Registration Form </h1>
  <div class="form-group">
        <label class="label_txt"> Name</label>
    <input type="text" class="form-control" name="fname" value="<?php if(isset($error)){ echo $_POST['name'];}?>" required="">
  </div>
   <div class="form-group">
    <label class="label_txt">contact no</label>
    <input type="text" name="contactno" maxlength="10" class="form-control" value="<?php if(isset($error)){ echo $_POST['contactno'];}?>" required="">
  </div>
  <div class="form-group">
    <label class="label_txt">gender</label>
    <select name="gender" class="form-control"required>
					<option value="">--Please Select--</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
          <option value="other">other</option>
				</select>
  </div>
  <label for="joiningDate">Joining Date:</label>
    <input type="date" name="joiningDate" class="form-control" value="<?php if(isset($error)){ echo $_POST['joiningDate'];}?>" required>
    <br>

    <label for="dateOfBirth">date of birth:</label>
    <input type="date" name="dateOfBirth"class="form-control" value=" max="<?php echo date('Y-m-d', strtotime('-16 years'));?>  required >

  <div class="form-group">
  <label for="package">Package:</label>
    <select name="package" class="form-control" required>
        <option value="">--Please Select--</option>
        <option value="under 3000">Basic (under 3000)</option>
        <option value="above 3000">Standard(above 3000)</option>
        <option value="above 5000">Premium (above 5000)</option>
    </select>
  </div>

  <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">SignUp</button>
   <p>Have an account?  <a href="login.php">Log in</a> </p>
</form>
<?php } ?> 
</div>
		</div>
		<div class="col-sm-4">
		</div>

	</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
