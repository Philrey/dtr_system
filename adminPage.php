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
?>
<!DOCTYPE html>
<html>
	<header>
		<title>Admin Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		}
	</style>
	<script src="script_functions.js"></script>
	<!--Add Item Form-->
		<div id="bg" style="display: none;"></div>
		<div id="addForm"  style="display:none; z-index: 2;">
			<button onclick="changeDisplay('addForm','none');changeDisplay('bg','none')"> X </button>
			<p>
			<form method="POST" action="addUser.php">
				<h4>Add New User</h4>
				<h5>User Name</h5>
					<input class="inp" type="text" name="uName" value="" placeholder="1000 characters max" required="true" width="20" height="20">
				<h5>Pin Number </h5>
				<input class="inp" type="number" name="uPin" value="" placeholder="11 characters max" required="true">
				
				<br><br>
				<button type="submit" name="submit" value="addUser"> OK </button>
			</form>
			</p>
		</div>
	
	<body>
		<h2>Welcome Admin</h2>
		
		<!--Admin Controls-->
		<button id="addBtn" onclick="changeDisplay('addForm','block');changeDisplay('bg','block');">Add New User</button>
		<button type="button" id="viewBtn" onclick="redirectPage('viewBtn','viewAll.php');">View All Records</button>
		
		<!--Search and Filters-->
		
		<!--Table COntents-->
		<br><br>
		<table width="99%" border="1">
			<!--Columns-->
			<tr>
				<th>ID</th>	<th>User Name</th> <th>Pin Number</th> <th>Actions</th>
			</tr>
			<!--Rows-->
			<?php
				
				$filters = "";
				//Logic for filters here...
				
				$result = return_values("*","users","".$filters,1);
				
				for($n=0;$n<sizeof($result);$n++){
					echo '
						<tr>
							<td id="user'.$result[$n][0].'">'.$result[$n][0].'</td>
							<td>'.$result[$n][1].'</td>
							<td>'.$result[$n][2].'</td>
							<td>
								<form method="POST" action="userManagement.php">
									<input style="display:none;" type="number" name="uId" value="'.$result[$n][0].'"> 
									<button type="button" name="submit" value="editUser">Edit</button>
									<button type="submit" name="submit" value="deleteUser">Delete</button>
								</form>
								<form method="POST" action="viewRecords.php">
									<input style="display:none;" type="number" name="uId" value="'.$result[$n][0].'"> 
									<button type="submit" name="submit" value="viewUser">View Records</button>
								</form>
							</td>
						</tr>
					';
				}
			?>
			
			
			
		</table>
	</body>
	
</html>