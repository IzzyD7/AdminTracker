<?php 
include("inc/functions.php");

$id = null;
$firstName = null;
$lastName = null;
$userName = null;
$addDept = null;
$addStatus = "";
$arrayName = null;
$addUser = "setVar";
$result = null;
$allStatus = null;
$dept = null;
$deptStatus = null;
$sStatus = null;


if (isset($_POST["addgo"])) {
		$firstName = filter_input(INPUT_POST,"fn",FILTER_SANITIZE_STRING);
		$lastName = filter_input(INPUT_POST,"ln",FILTER_SANITIZE_STRING);
		$userName = filter_input(INPUT_POST,"un",FILTER_SANITIZE_STRING);
		$addDept = filter_input(INPUT_POST,"addDept",FILTER_SANITIZE_STRING);
		$addStatus = filter_input(INPUT_POST,"addStatus",FILTER_SANITIZE_STRING);
	if (!isset($_POST["fn"]) || !isset($_POST["ln"]) || !isset($_POST["un"]) || !isset($_POST["addDept"]) || !isset($_POST["addStatus"])) {
		$result = "Please fill out form completely.";
	} else {
		$addUser = add_user($firstName,$lastName,$userName,$addDept,$addStatus);
		$result = "New record was created successfully.";
	}
}	


if (isset($_POST["ugo"])) {
	if(isset($_POST["status"])) {
		$allStatus = $_POST["status"];
	} else {
		$allStatus = null;
	}
	if ($allStatus == null) {
		$result = "Please select a either 'Admin' or 'Not Admin'.";
	} else {
		$result = all_users($allStatus);
	}
}

if (isset($_POST["dgo"])) {
	$dept = $_POST["dept"];
	if (isset($_POST["status"])) {
		$deptStatus = $_POST["status"];
	} else {
		$deptStatus = null;
	}

	if ($dept == "" && $deptStatus == "") {
		$result = "Please select a department from the drop down menu and either 'Admin' or 'Not Admin'.";
	} elseif ($dept == "") {
		$result = "Please select a department from the drop down menu.";
	} 	elseif ($deptStatus == null) {
		$result = "Please select either 'Admin' or 'Not Admin'.";
	} else {
		$result = by_dept($dept,$deptStatus);
		if (empty($result) && $deptStatus == "y") {
			$result = "There are no Administrators in ".$dept.".";
		} elseif (empty($result) && $deptStatus == "n") {
			$result = "All clients in ".$dept." are Administrators. ";
		}	
	}
}

$sStatus = null;

if (isset($_POST["s"])) {
	$search = filter_input(INPUT_POST,"s",FILTER_SANITIZE_STRING);
	if (isset($_POST["status"])) {	
		$sStatus = $_POST["status"];
	} else {
		$sStatus = null;
	}
	
	if ($search == "" && empty($sStatus)) {
		$result = "Please enter a search term and select either 'Admin' or 'Not Admin'.";
	} elseif ($search == "") {
		$result = "Please enter in a search term.";
	} elseif (empty($sStatus)) {
		$result = "Please select either 'Admin' or 'Not Admin' status.";
	} else {
		$result = search_name($search,$sStatus);
		if (!$result) {
			$result = "The client does not exist. Please try again.";
		}	
	}	
}

if (isset($_POST["r"])) {
	$id = null;
	$firstName = null;
	$lastName = null;
	$userName = null;
	$addDept = null;
	$addStatus = "n";
	$result = null;
	$allStatus = null;
	$dept = null;
	$deptStatus = null;
	$sStatus = null;
}

?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Admin Tracking Utlility</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Gafata|Audiowide' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/adminTrack.css">
	</head>
	<body>
		<header class="header">
			<div class="container">
				<div class="wrapper row">
					<div class="app-title col-sm-10"><h1>Admin Tracking Utility</h1></div>
					<div class="intranet-page col-sm-2"><a href="intranet.php"><img src="img/logo1.png" alt="COMPANY LOGO" width="140" height="70"></a></div>
				</div>
			</div>
		</header>

		<div class="main-layout">
			<div class="container">	
				<div class="row">
					<div class="addition-edit-delete col-md-6">
						<div class="user-add form-group">
							<h3>Add a user:</h3>
							<form method="POST" action="">
								<table class="table-condensed">
									<tbody>
										<tr>
											<th>
												<label for="fn">First Name:</label>
											</th>	
											<td>
												<input type="text" id="fn" name="fn">
											</td>	
										</tr>
										<tr>
											<th>
												<label for="ln">Last Name:</label>
											</th>	
											<td>
												<input type="text" id="ln" name="ln">
											</td>	
										</tr>
										<tr>
											<th>
												<label for="un">Username:</label>
											</th>	
											<td>
												<input type="text" id="un" name="un">
											</td>	
										</tr>
										<tr>
											<th>
												<label for="addDept">Department:</label>
											</th>	
											<td>							
											<select id="addDept" name="addDept">
												<option value=""></option>
												<option value="SUPPLY">Supply Chain</option>
												<option value="ENG">Engineering</option>
												<option value="IT">IT</option>
												<option value="CUST">Customer Service</option>
												<option value="ACCT">Accounting</option>
											</select>
											</td>	
										</tr>
										<tr>
											<th>
												<label for="admin">Administrator:</label>
											</th>	
											<td class="admin-radio">
												<input type="radio" id="addStatus" name="addStatus" value="y">Admin
												<input type="radio" id="addStatus" name="addStatus" value="n">Not Admin
											</td>
										</tr>
										<tr>
											<td>
												<input type="submit" id="addgo" name="addgo" value="Submit">
											</td>	
										</tr>						
									</tbody>
								</table>	
							</form>
						</div>

<!--Phase Two-->
<!-- 						<div class="user-edit">
							<h3>Edit a user:</h3>
							<form method="" action="">
								<table>
									<tbody>
										<tr>
											<th>
												<label for="fname">First Name:</label>
											</th>	
											<td>
												<input type="text" id="fname" name="fname" value>
											</td>	
										</tr>
										<tr>
											<th>
												<label for="lname">Last Name:</label>
											</th>	
											<td>
												<input type="text" id="lname" name="lname" value>
											</td>	
										</tr>
										<tr>
											<th>
												<label for="username">Username:</label>
											</th>	
											<td>
												<input type="text" id="username" name="username" value>
											</td>	
										</tr>
										<tr>
											<th>
												<label for="dept">Department:</label>
											</th>	
											<td>
												<input type="text" id="dept" name="dept" value>
											</td>	
										</tr>
										<tr>
											<th>
												<label for="admin">Administrator?:</label>
											</th>	
											<td>
												<input type="checkbox" id="admin" name="admin" value>
											</td>	
										</tr>
										<tr>
											<td>
												<input type="submit"  value="Submit">
											</td>	
										</tr>						
									</tbody>
								</table>	
							</form>			
						</div>
						<div class="user-delete">
							<h3>Delete a user:</h3>
							<form method="" action="">

							</form>
						</div>-->
					</div>
					
					<div class="reports-search col-md-6">
						<h3>Run a report or search:</h3>
						<div class="query-buttons"><h4></h4></div>
						<table class="">
							<tbody>
								<form method="POST" action="index.php">
									<tr>
										<th>
											<label for="all-users">All Users:</label>
										</th>
									</tr>
									<tr>	
										<td class="admin-radio">
												<input type="radio" id="status" name="status" value="y"<?php if (isset($allStatus) && $allStatus == "y") { echo " checked"; }?>>Admin
												<input type="radio" id="status" name="status" value="n"<?php if (isset($allStatus) && $allStatus == "n") { echo " checked"; }?>>Not Admin
										</td>
									</tr>
									<tr>
										<td class="search-buttons">
											<input type="submit" id="ugo" name="ugo"value="All Users">
										</td>
									</tr>
								</form>
								<form method="POST" action="index.php">
									<tr>
										<th>
											<label for="dept">Choose Dept:</label>
										</th>
									</tr>
									<tr>		
										<td>
											<select id="dept" name="dept">
												<option value=""></option>
												<option value="SUPPLY"<?php if (isset($dept) && $dept == "SUPPLY") { echo " selected"; }?>>Supply Chain</option>
												<option value="ENG"<?php if (isset($dept) && $dept == "ENG") { echo " selected"; }?>>Engineering</option>
												<option value="IT"<?php if (isset($dept) && $dept == "IT") { echo " selected"; }?>>IT</option>
												<option value="CUST"<?php if (isset($dept) && $dept == "CUST") { echo " selected"; }?>>Customer Service</option>
												<option value="ACCT"<?php if (isset($dept) && $dept == "ACCT") { echo " selected"; }?>>Accounting</option>
											</select>
										</td>
										<td class="admin-radio">
											<input type="radio" id="status" name="status" value="y"<?php if (isset($deptStatus) && $deptStatus == "y") { echo " checked"; }?>>Admin
											<input type="radio" id="status" name="status" value="n"<?php if (isset($deptStatus) && $deptStatus == "n") { echo " checked"; }?>>Not Admin
										</td>
									</tr>
										<td class="search-buttons">	
											<input type="submit" id="dgo" name="dgo" value="By Dept">
										</td>
									</tr>
								</form>						
								<form method="POST" action="index.php">
									<tr>
										<th>
											<label for="s">Search By Last Name:</label>
										</th>
									</tr>
									<tr>
										<td>
											<input type="text" name="s" id="s" value="<?php if(isset($search)) { echo $search; }?>"/>
										</td>
										<td class="admin-radio">
											<input type="radio" id="status" name="status" value="y"<?php if (isset($sStatus) && $sStatus == "y") { echo " checked"; }?>>Admin
											<input type="radio" id="status" name="status" value="n"<?php if (isset($sStatus) && $sStatus == "n") { echo " checked"; }?>>Not Admin
										</td>	
									</tr>
									<tr>
										<td class="search-buttons">		
											<input type="submit" id="go" value="Go"/>
										</td>
									</tr>
								</form>												
							</tbody>
						</table>
					</div>
			        <div class="col-md-8 results">
						<h3>Results:</h3> 
						<form method="POST" action="index.php">
							<input type="submit" id="r" value="RESET"/>
						</form>	
						<div class="result-area">
							<?php
								if ($result != null) {
									if (is_string($result)) {
										echo "<h3>".$result."</h3>";
									} else {
										if ($allStatus == "y" || $sStatus == "y" || $deptStatus == "y") {
											echo "<h3>Search Results For Administrators:</h3>";
											echo "<h4>".count($result)." records found.</h4>";
										} elseif ($allStatus == "n" || $sStatus == "n" || $deptStatus == "n") {
											echo "<h3>Search Results For Non-Administrators:</h3>";
											echo "<h4>".count($result)." records found.</h4>";
										}
										foreach ($result as $client) {
										echo display_results($client);
										}
									}
								}	
							?>
						</div>
					</div>
				 </div>

			</div>
		</div>	
		<footer class="footer row">
			<div class="col-xs-offset-5">
				<div class="footer-text">Built by Mordecai Designs &copy;2016 </div>
			</div>
		</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
