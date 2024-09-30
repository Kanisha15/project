<?php session_start();
include_once('config.php');
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manage Users | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
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
    <body class="sb-nav-fixed">
      <?php include_once('navbar.php');?>
        <div id="layoutSidenav">
         <?php include_once('sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">
                          Search Results</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard1.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Search Results</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Search Result
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <table align="center" width="1200" style="color:black;">
		                        <tr align="center">
                                    <th>
                                     <tr>
                                  <th>S.no</th>
                                  <th>id</th>
                                  <th>First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>Contact no.</th>
                                  <th> gender</th>
                                 <th> joiningdate</th>
                                 <th> dateofbirth</th>
                                 <th> package</th>
                                  <th>Action</th>
                                        </tr>
                                    </th>
                                    <tfoot>
                                    <tbody>
<?php 
$searchkey=$_POST['searchkey'];
$ret=mysqli_query($con,"select * from member where (  id like '%$searchkey%' || fname like '%$searchkey%' || lname like '%$searchkey%' || email like '%$searchkey%' || contactno like '%$searchkey%' || gender like '%$searchkey%' || joiningdate like '%$searchkey%' || dateofbirth like '%$searchkey%' || package like '%$searchkey%')");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                                 <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['id'];?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['contactno'];?></td> 
                                  <td><?php echo $row['gender']; ?></td>
                                  <td><?php echo $row['joiningdate']; ?></td>
                                 <td><?php echo $row['dateofbirth']; ?></td>
                                 <td><?php echo $row['package']; ?></td>
                                  <td>
                                     <a href="account.php?id=<?php echo $row['id'];?>"> 
                                     <a href="view_user.php?id=<?php echo $row['id'];?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                              </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
