<?php
require 'config.php';


	$plid =$_POST['plid'];
    $plname = $_POST['plname'];
    $pldescription = $_POST['pldescription'];
    $plvalidity = $_POST['plvalidity'];
    $plamount = $_POST['plamount'];
    
   //Inserting data into plan table
    $query="insert into plan(plid,plname,pldescription,plvalidity,plamount,active) values('$plid','$plname','$pldescription','$plvalidity','$plamount','yes')";
   
   

	 if(mysqli_query($con,$query)==1){
        
        echo "<head><script>alert('PLAN Added ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=new_plan.php'>";
       
      }

    else{
        echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>