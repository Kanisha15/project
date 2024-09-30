<?php
require_once("config.php");

if (!isset($_SESSION["login_sess"])) {
    header("location:login.php");
}

$email = $_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM member WHERE email= '$email'");
if ($res = mysqli_fetch_array($findresult)) {
    $id = $res['id'];
    $fname = $res['fname'];
    $lname = $res['lname'];
    $email = $res['email'];
    $address = $res['address'];
    $contactno = $res['contactno'];
    $gender =$res['gender'];
    $joiningdate = $res['joiningdate'];
    $dateofbirth = $res['dateofbirth'];
    $package = $res['package'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $gender =$_POST['gender'];
    $dateofbirth = $_POST['dateofbirth'];
    $package = $_POST['package'];

    $update_query = "UPDATE member SET fname='$fname', lname='$lname', address='$address', contactno='$contactno', gender='$gender', dateofbirth='$dateofbirth', package='$package' WHERE id='$id'";
    if (mysqli_query($dbc, $update_query)) {
        header("location: account.php");
    } else {
        echo "Error updating record: " . mysqli_error($dbc);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile - Gym</title>
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
                            <h3>Edit Profile</h3>
                        </div>
                        <div class="col">
                            <p><a href="dashbord.php"><span style="color:red;">Logout</span> </a></p>
                        </div>
                    </div>

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4 col-form-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="fname" name="fname" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-4 col-form-label">Last Name</label>
                            <div class="col-sm-8">
                             <input type="text" class="form-control" id="lname" name="lname" value="<?php if(isset($error)){ echo $_POST['lname'];}?>" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" name="address" value="<?php if(isset($error)){ echo $_POST['address'];}?>" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contactno" class="col-sm-4 col-form-label">Contact No</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="contactno" name="contactno" value="<?php if(isset($error)){ echo $_POST['contactno'];}?>" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                <select name="gender" class="form-control" required="">
                                <option value="">--Please Select--</option>
    <option value="MALE">MALE</option>
    <option value="FEMALE">FEMALE</option>
    <option value="OTHER">OTHER</option>
</select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateofbirth" class="col-sm-4 col-form-label">Date of Birth</label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="<?php if(isset($error)){ echo $_POST['dateofbirth'];}?>" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="package" class="col-sm-4 col-form-label">package</label>
                        <div class="col-sm-8">
                        <select name="package" class="form-control" required>
    <option value="">--Please Select--</option>
    <option value="Basic(under 3000)">Basic (under 3000)</option>
    <option value="Standard(above 3000)">Standard(above 3000)</option>
    <option value="Premiun(above 5000)">Premium (above 5000)</option>
</select> 
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
