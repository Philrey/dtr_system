<?php
	include("functions.php");
	
	if(isset($_POST['submit'])){
		if($_POST['submit']=='viewUser'){
			//Redirect to User Details page
		}
		if($_POST['submit']=='deleteUser'){
			//Execute query
			$result = delete_values("users","u_id='".$_POST['uId']."'");
			
			if($result){
				echo '<meta http-equiv="refresh" content="0; URL=adminPage.php">
				<meta name="keywords" content="automatic redirection">';
			}else{
				echo 'Delete Failed.. Please Check query for debugging...';
				echo '<meta http-equiv="refresh" content="5; URL=adminPage.php">
				<meta name="keywords" content="automatic redirection">';
			}
		}
	}else{
		//redirect to dtr page
		echo '<meta http-equiv="refresh" content="0; URL=index.php">
		<meta name="keywords" content="automatic redirection">';
	}
?>