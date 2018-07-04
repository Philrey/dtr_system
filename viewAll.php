<?php
	include("functions.php");
	if(isset($_POST['submit'])){
		if($_POST['submit']=='updateRecord'){
			update_values("records",
							"r_time1='".to24Hour($_POST['t1'])."',
							r_time2='".to24Hour($_POST['t2'])."',
							r_time3='".to24Hour($_POST['t3'])."',
							r_time4='".to24Hour($_POST['t4'])."'"
							
							,"r_id = '".$_POST['rId']."'");
		}
	}
?>

<!DOCTYPE html>
<html>
	<header>
		<title>View Records</title>
	</header>
	<style>
		td {
			text-align: center;
		}
		#bg {
			top: 0;
			left: 0;
			
			background-color: black;
			opacity: 0.5;
			position: fixed;
			width: 100%;
			height: 100%;
		}
		#addForm {
			width : 25%;
			height: 40%;
			border: 3px solid #73AD21;
			padding: 10px; z-index: 1;
			position: fixed;
			top: 35%;
			left: 35%;
			background-color: white;
			padding: 20px;
			overflow:auto;
		}
		.inp {
			width: 100%;
			text-align: center;
		}
		#signatures {
			display: none;
		}
		#header {
			display: none;
			margin-left: auto;
			margin-right: auto;
		}
		
	@media print{
		.toHide {
			display: none;
		}
		.toShow {
			display: block;
		}
		#header {
			display: block;
		}
	}
	</style>
	<script src="script_functions.js">
	</script>
	<body>
		<div class="toHide">
		
		<button type="button" id="viewBtn" onclick="redirectPage('viewBtn','adminPage.php');">Back To Admin Page</button>
		
		
		<h2>View Records</h2>
		
		<!--Filters-->
		<form method="POST" action="">
			<h3>From</h3>
				<input type="date" name="dateFrom">
			<h3>To</h3>
				<input type="date" name="dateTo">
			<br>
			<button type="submit" name="submit" value="filtered">Search</button>
		</form>
		</div>
		
		<img id="header" src="Header.png">
		
		<table width="99%" border="0" style="text-align: center;">
			<!--Update Record-->
				<div id="bg" style="display: none;"></div>
				<div id="addForm"  style="display:none; z-index: 2;">
					<button onclick="changeDisplay('addForm','none');changeDisplay('bg','none')"> X </button>
					<p>
					<form method="POST" action="viewRecords.php">
						<h4>Edit User Record</h4>
							<input readonly="true" class="" id="rId" type="text" name="rId" value="" required="true">
							<input readonly="true" class="" id="uId" type="text" name="uId" value="" required="true">
						<h5>User Name</h5>
							<input readonly="true" id="uName" class="inp" type="text" name="uName" value="" placeholder="1000 characters max" required="true" width="20" height="20">
						
						<h5>Login AM</h5>
							<input class="inp" type="text" id="t1" name="t1" value="" required="true">
						<h5>Logout AM</h5>
							<input class="inp" type="text" id="t2" name="t2" value="" required="true">
						<h5>Login PM</h5>
							<input class="inp" type="text" id="t3" name="t3" value="" required="true">
						<h5>Logout PM</h5>
							<input class="inp" type="text" id="t4" name="t4" value="" required="true">
						
						<br><br>
						<button type="submit" name="submit" value="updateRecord"> OK </button>
					</form>
					</p>
				</div>
			
			<!--Columns-->
			<tr>
				<th>Date</th>
				<th>User Name</th>
				<th>Log In</th>
				<th>Log Out</th>
				<th>Log In</th>
				<th>Log Out</th>
				<th>Signature</th>
				<th class="toHide">Actions</th>
			</tr>
			
			
				
			<!--Rows-->
			<?php
				//Filters
				$filters = '';
				if(isset($_POST['submit'])){
					if($_POST['submit']=='filtered'){
						if(strlen($_POST['dateFrom'])>=10){
							$filters.= "where (r_date >='".toWordDate($_POST['dateFrom'])."') ";
						}
						if(strpos($filters,"where ")!==FALSE){
							if(strlen($_POST['dateTo'])>=10){
								$filters .= "&& (r_date <= '".toWordDate($_POST['dateTo'])."') ";
							}
						}else{
							if(strlen($_POST['dateTo'])>=10){
								$filters .= "where (r_date <= '".toWordDate($_POST['dateTo'])."')";
							}
						}
					}
				}
				
				$filters .= "ORDER BY r_date DESC";
				
				$result = return_values("distinct(r_date)","dtr_view","".$filters,4);
				
				for($n=0;$n<sizeof($result);$n++){
					//Column Data
					echo '
						<tr>
							<td>'.$result[$n][0].'</td>
						</tr>';
					
					$users = return_values("*","dtr_view","where r_date = '".$result[$n][0]."' ORDER BY r_id ASC",3);
					
					for($x=0;$x<sizeof($users);$x++){
						echo '<tr>
							<td></td>
										<td>'.$users[$x][3].'</td>
										
										<td>'.$users[$x][4].'</td>
										<td>'.$users[$x][5].'</td>
										<td>'.$users[$x][6].'</td>
										<td>'.$users[$x][7].'</td>
										<td></td>
										<td class="toHide">
											<button type="button" id="addBtn" 
											onclick="
												changeDisplay(\'addForm\',\'block\');
												changeDisplay(\'bg\',\'block\');
												addUnit(\'rId\',\''.$users[$x][0].'\');
												addUnit(\'uId\',\''.$users[$x][2].'\');
												addUnit(\'uName\',\''.$users[$x][3].'\');
												addUnit(\'t1\',\''.$users[$x][4].'\');
												addUnit(\'t2\',\''.$users[$x][5].'\');
												addUnit(\'t3\',\''.$users[$x][6].'\');
												addUnit(\'t4\',\''.$users[$x][7].'\');
											">Edit</button>
										</td>
							</tr>
					';
					}
					
				}
			?>
			
		</table>
	</body>
</html>