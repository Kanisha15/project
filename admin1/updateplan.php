<?php
require 'config.php';

    
    
   $plid=$_POST['plid'];
   $plname=$_POST['plname'];
   $pldescription=$_POST['pldescription'];
   $plvalidity=$_POST['plvalidity'];
   $plamount=$_POST['plamount'];
   
    
    $query1="update plan set plname='".$plname."',pldescription='".$pldescription."',plvalidity='".$plvalidity."',plamount='".$plamount."' where plid='".$plid."'";

   if(mysqli_query($con,$query1)){
     
            echo "<html><head><script>alert('PLAN Updated Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=view_plan.php'>";  
   }
   else{
    echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
    echo "error".mysqli_error($con);
   }
    

?>