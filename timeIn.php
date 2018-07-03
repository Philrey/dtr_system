<?php
	include('functions.php');
	
	if(isset($_POST['submit']) ){
		if($_POST['submit']=='timeIn'){
			$Passed = FALSE;
			//Get User ID based on uPin posted
			$user = return_values("*","users","where u_pin='".$_POST['uPin']."'",1);
			if($user!=FALSE){
				
				$Passed = TRUE;
			}else{
				echo "User Does Not Exist";
				echo '<meta http-equiv="refresh" content="5; URL=index.php">
				<meta name="keywords" content="automatic redirection">';
			}
			//Check records table if the current date exists, else create a new record
			if($Passed){
				$record = return_values("*","records","where u_id ='".$user[0][0]."' && r_date ='".getDateNow(1,10)."'",2);
				
				if($record!=FALSE){
					$toUpdate = 'r_time';
					$timeFull = TRUE;
					
					//check the timeN columns if there is an empty slot and insert the current time,
					for($n=4;$n<7;$n++){
						if($record[0][$n]=="00:00:00"){
							$toUpdate .= ($n - 2);
							$timeFull = FALSE;
							break;
						}
					}
					if(!$timeFull){
						update_values("records",$toUpdate."='".getDateNow(12,8)."'","r_id='".$record[0][0]."'");
						echo '<meta http-equiv="refresh" content="0; URL=index.php">
						<meta name="keywords" content="automatic redirection">';
					}else{
						echo "You Have Reached The Max Time in/out for this Day...Redirecting in 5 seconds...";
						echo '<meta http-equiv="refresh" content="5; URL=index.php">
						<meta name="keywords" content="automatic redirection">';
					}
					
				}else{
					echo "insert new entry";
					add_to(	"records",
							"u_id,r_date,r_time1",
							"'".$user[0][0]."' , '".getDateNow(1,10)."' , '".getDateNow(12,8)."'");
					//redirect to index page
					
				}
			}else{
				
			}
			
				//else prompt user that they have submitted the max entry for this date
			//Redirect to index
		}
	}else{
		//redirect to index page
		echo '<meta http-equiv="refresh" content="0; URL=index.php">
		<meta name="keywords" content="automatic redirection">';
	}
?>