<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
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

    <title>Gym | New Plan</title>
  
	<link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<style>
    	.page-container .sidebar-menu #main-menu li#planhassubopen > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}

    </style>
  

</head>
    <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
			</header>
    		
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
		
					
				</div>

		<h3>Create Plan</h3>

		<hr />
        </div>
	   <body bgcolor="#999999">
	   <form method="post" action="submit_plan_new.php" enctype="multipart/form-data">
		<table width="1000px" align="center" border="6" bgcolor="#f1533e">
         <tr>
           <td height="35"><table width="100%" border="0" align="center"><tr>
				<td colspan="3" align="center"><h1>Create Plan</h1></td>
			</tr>
           	 <tr>
           	   <td height="35">PLAN ID:</td>
           	   <td height="35"><?php
							function getRandomWord($len = 6)
							{
							    $word = array_merge(range('A', 'Z'));
							    shuffle($word);
							    return substr(implode($word), 0, $len);
							}

						?>
				<input type="text" name="plid" id="plid" readonly value="<?php echo getRandomWord(); ?>"></td>
         	   </tr>
             <tr>
               <td height="35">PLAN NAME:</td>
               <td height="35"><input name="plname" id="plname" type="text" placeholder="Enter plan name" size="40"></td>
             </tr>
             <tr>
               <td height="35">PLAN DESCRIPTION</td>
               <td height="35"><input type="text" name="pldescription" id="pldescription" placeholder="Enter plan description" size="40"></td>
             </tr>
             <tr>
               <td height="35">PLAN VALIDITY</td>
               <td height="35"><input type="text" name="plvalidity" id="plValidity" placeholder="Enter validity in months" size="40"></td>
             </tr>
             
             <tr>
               <td height="35">PLAN AMOUNT:</td>
               <td height="35"><input type="text" name="plamount" id="plamount" placeholder="Enter plan amount" size="40"></td>
             </tr>
             
            
             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="CREATE PLAN" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Reset"></td>
             </tr>
           </table></td>
         </tr>
         </table>
       </form>
    </div>
    </div>   
		
		

    	</div>

    </body>
</html>
