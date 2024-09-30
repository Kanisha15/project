<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head>
<title> SignUp </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="row">
		</div>
		<div class="col-sm-4">
       <div class="signup_form">
		<form action="" method="POST">
    <h1>ARRANGE SCHEDULE</h1>
  <div class="form-group">
    
        <label class="label_txt">schdeule period</label>
    <input type="text" class="form-control" name="period">

  </div>
  <div class="form-group">
    <label class="label_txt">date </label>
    <input type="date" class="form-control" name="date" >
  </div>
 
<div class="form-group">
    <label class="label_txt">morning time </label>
    <input type="text" class="form-control" name="morning time">
  </div>

<div class="form-group">
    <label class="label_txt">evening time</label>
    <input type="email" class="form-control" name="evening time">
  </div>
  <button type="submit" name="create schedule" class="btn btn-primary btn-group-lg form_btn">create plan</button>
  <p> Have to payment here! <a href="dashbord.php">dashbord</a> </p>
</form>
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
