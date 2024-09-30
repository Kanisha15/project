<?php session_start();
include_once('config.php');


if(isset($_POST['add']))
{
    $Date=$_POST['Date'];
	$Fullname=$_POST['name'];
	$Address=$_POST['address'];
    $Source=$_POST['Source'];
    $Destination=$_POST['Destination'];
    $Distance=$_POST['Distance'];
    $Cost=$_POST['Cost'];
    $Veh_id=$_POST['Veh_id'];

	$userid= 1; 
	$date = date("Y-m-d H:i:s");
	

	
	$msg = mysqli_query($con, "INSERT INTO booking_master (Date,Fullname, Address, Source, Destination, Distance, Cost, Veh_id) VALUES ('$Date','$Fullname', '$Address', '$Source', '$Destination', '$Distance', '$Cost', '$Veh_id')");


if (!$msg) 
{
    
    echo "Error: " . mysqli_error($con);
     error_log("Error in SQL query: " . mysqli_error($con), 0);
} else
	{
    echo "Booking added successfully!";
}
if($msg)
{
    echo "<script>alert('Booking added successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'manage-Booking.php'; </script>";
}
}


    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Booking</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="./css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
		   <style>
      body {
        background-image: url('b1.jpg');
        background-size: cover;
        background-position: center;
	
      }
	  </style>
    </head>
	
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        <h1 class="mt-4">Add Booking</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    
								<tr>
                                       <th>Date</th>
                                       <td><input class="form-control" id="Date" name="Date" type="Date"   required value="" /></td>
                                   </tr>
								   
								   
								   
								   <div class="form-group mb-3">
      <label for="name">Fullname:</label>
      <input type="text" maxlength="50" class="form-control" id="name" name="name" placeholder="Full Name" required>
      <small id="nameError" class="form-text text-danger" style="display: none;">Please enter a valid name (only alphabetic characters).</small>
    </div>
	
	
                                   <!--<tr>
                                       <th>Address</th>
                                       <td><input class="form-control" id="Address" name="Address" type="text"   required value="" /></td>
                                   </tr>-->
								   
								   <div class="form-group mb-3">
      <label for="address">Full Address:</label>
      <textarea class="form-control" id="address" maxlength="250" name="address" rows="3" placeholder="Flat No. Building Name, Street No., Pincode" required></textarea>
      <small id="addressError" class="form-text text-danger" style="display: none;">Please enter a valid address in the format: Flat No. Building Name, Street No., Pincode.</small>
    </div>
                                         <tr>
                                       <th>Source</th>
                                       <td colspan="3"><input class="form-control" id="Source" name="Source" type="text"  maxlength="10" required value="" /></td>
									   
                                   </tr>
								   <tr>
                                       <th>Destination</th>
                                       <td colspan="3"><input class="Destination" id="Destination" name="Destination" type="text"  maxlength="10" required value="" /></td>
                                   </tr>

                                   <tr>
                                       <th>Distance (Km)</th>
                                       <td colspan="3"><input class="Distance" id="Distance" name="Distance" type="number"  maxlength="10" required value="" /></td>
                                   </tr>

                                   <tr>
                                       <th>Cost (Rs)</th>
                                       <td colspan="3"><input class="Cost" id="Cost" name="Cost" type="number"  maxlength="10" required value="" /></td>
                                   </tr>

                                   
                                   <tr>
                                       <th>Veh_id</th>
                                       <td colspan="3"><input class="Veh_id" id="Veh_id" name="Veh_id" type="text"  maxlength="10" required value="" /></td>
                                   </tr>



                                     
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="add">Add Booking</button></td>
									   
									  </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>


                    </div>
                </main>
          <?php include('./includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script> -->
    </body>
</html>
