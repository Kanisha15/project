<?php require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM member WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{ 
$id=$res['id'];
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email']; 
$address=$res['address'];
$contactno=$res['contactno'];
$gender =$res['gender'];
$joiningdate=$res['joiningdate'];
$dateofbirth=$res['dateofbirth'];
$package=$res['package'];

}
 ?>
 <!DOCTYPE html>
<html>
<head>
    <title> My Account - gym</title>
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
  <div class="login_form">
          <div class="row">
            <div class="col"></div>
           <div class="col-6"> 

  <p> <h3>MY PROFILE <h3> <span style="color:#33CC00"></span></p>
  </center>
           </div>
            <div class="col"><p><a href="dashbord.php"><span style="color:red;">dashbord</span> </a></p>
         </div>
          </div>

          <table class="table">
          <tr>
              <th>First Name </th>
              <td><?php echo $fname; ?></td>
          </tr>
          <tr>
              <th>Last Name </th>
              <td><?php echo $lname; ?></td>
          </tr>
          <tr>
              <th>email </th>
              <td><?php echo $email; ?></td>
          </tr>
          <tr>
              <th>address </th>
              <td><?php echo $address; ?></td>
          </tr>
          <tr>
              <th>contactno </th>
              <td><?php echo $contactno; ?></td>
          </tr>
          <tr>
              <th>gender</th>
              <td><?php echo $gender; ?></td>
          </tr>
          <tr>
              <th>dateofbirth</th>
              <td><?php echo $dateofbirth; ?></td>
          </tr>
          <tr>
              <th>package</th>
              <td><?php echo $package; ?></td>
          </tr>

           <tr>
              <th>joiningdate </th>
              <td><?php echo $joiningdate; ?></td>

          </tr>
          </table>
           <div class="row">
            <div class="col-sm-2">
            </div>
             <div class="col-sm-4">
                <a href="edit-profile.php"><button type="button" class="btn btn-primary">Edit Profile</button></a>
            </div>
           </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
