<!--
	******************************
	******************************
	**							**
	**	XD		XD	XDXDXD		**
	**	  XD  XD	XD	  XD	**
	**	    XD		XD	  XD	**
	**	  XD  XD	XD	  XD	**
	**	XD		XD	XDXDXD		**
	**							**
	**By: Phil Rey E. Paderogao	**
	******************************
	******************************
-->

<?php
	include("functions.php");

	if(isset($_POST['submit'])){
		if($_POST['submit']=='addUser'){
			$result = FALSE;
			$result=add_to(	"users",
							"u_name,u_pin",
							"'".$_POST['uName']."' , '".$_POST['uPin']."'");
			if($result){
				
				echo '<meta http-equiv="refresh" content="0; URL=adminPage.php">
				<meta name="keywords" content="automatic redirection">';
			}else{
				echo '<h2>Adding Failed, Check Query For Debugging</h2>';
				
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