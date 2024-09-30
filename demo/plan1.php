<!DOCTYPE html>
<?php
require_once("config.php");

if (!isset($_SESSION["login_sess"])) {
    header("location:login.php");
}
$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM member WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{ 
$plid=$res['id'];
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
<html>
<head>
<title> plan </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css">
</head>
<style>

  body {
       margin: 0;
        padding: 0;
         background-image: url(back.jpg);
         background-size: cover;
         background-repeat: no-repeat;
         background-attachment: fixed;
            }

.container {
    display:flex;
}

.sidebar {
    width: 200px;
    background-color: #333;
    color: #fff;
    height: 100vh;
    padding-top: 20px;
}

.logo {
    text-align: center;
    padding-bottom: 20px;
}

.nav-list {
    list-style: none;
    padding: 0;
}

.nav-list li {
    padding: 10px;
}

.nav-list a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    display: block;
}

.nav-list a:hover {
    background-color: #555;
}

.content {
    flex: 1;
    padding: 20px;
}
    </style>
<body>
	<div class="row">
		</div>
		<div class="col-sm-4">
       <div class="signup_form">
       <div class="row">
    <div class="col-sm-4">
    </div>
     <div class="col-sm-4">
</div> 
     <div class="col-sm-4">
    </div>
  </div>
	<div class="row">
		<form action="" method="POST">
    <h3>SELECT PLAN</h3>
<hr />
    
    </div>
    <form id="form1" name="form1" method="post" class="a1-container" action="new_submit.php">
     <table width="100%"  border="0" align="center">
     <tr>
       <td height="44"><table width="100%" border="0" align="center">
         <tr>
           <td height="35">PLAN:</td>
           <td height="35"><select name="plname" id="boxx" required onchange="myplandetail(this.value)">
      <option value="">--Please Select--</option>
      <?php
        $query="select * from plan where active='yes'";
        $result=mysqli_query($dbc,$query);
        if(mysqli_affected_rows($dbc)!=0){
          while($row=mysqli_fetch_row($result)){
            echo "<option value=".$row[0].">".$row[1]."</option>";
          }
        }

      ?>
      
    </select></td>
         </tr>
  
  <tbody id="plandetls">
         
        </tbody>

         <tr>
         <tr>
           <td height="35">&nbsp;</td>
           <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Register" ><input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Reset"></td>
         </tr>
       </table></td>
     </tr>
     </table>
     <div class="col"><p><a href="dashbord.php"><span style="color:red;">dashbord</span> </a></p>
         </div>
   </form>
</div>

      </div>
</div>   
    
    <script>
      function myplandetail(str){

        if(str==""){
          document.getElementById("plandetls").innerHTML = "";
          return;
        }else{
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("plandetls").innerHTML=this.responseText;
            
              }
          };
          
            xmlhttp.open("GET","plandetail.php?q="+str,true);
            xmlhttp.send();	
        }
        
      }
    </script>

    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
