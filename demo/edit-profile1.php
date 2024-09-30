<?php require_once("config.php");

  if (isset($_SESSION["login_sess"])) {
  }
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM member WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
 
$up_id = $res['id'];  
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];
$contactno = $res['contactno'];
$address= $res['address'];
$package = $res['package'];
$dateofbirth = $res['dateofbirth'];
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
           
     <form action="" method="POST" enctype='multipart/form-data'>
  <div class="login_form">
<?php 
 if(isset($_POST['update_profile'])){
$fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $email=$_POST['email'] ;
 $up_id=$_POST['id']; 
 $address=$_POST['address'];
 $contactno=$_POST['contactno'];
 $dateofbirth=$_POST['dateofbirth'];
 $package=$_POST['package'];

$sql="SELECT * from member where id='$up_id'";
      $res=mysqli_query($dbc,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);
}
    if(!isset($error)){ 
         
           $result = mysqli_query($dbc,"UPDATE member SET fname='$fname',lname='$lname', address='$address', email='$email',contactno='$contactno',dateofbirth='$dateofbirth',package='$package' WHERE email ='$email'");
           if($result)
           {
             header("location:account.php?profile_updated=1");
           }
           else 
           {
            $error[]='Something went wrong';
           }

    }
    }
   
        if(isset($error)){ 

foreach($error as $error){ 
  echo '<p class="errmsg">'.$error.'</p>'; 
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

<label for="dateofbirth">date of birth:</label>
<input type="date" name="dateofbirth"class="form-control" value=" max="<?php echo date('Y-m-d', strtotime('-16 years'));?>  required="">

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
<button  class="btn btn-success" name="update_profile">Save Profile</button>
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
