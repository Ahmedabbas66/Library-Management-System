<?php 
	session_start(); 
	#fetch data from database 
	$connection = mysqli_connect("localhost", "root", ""); 
	$db = mysqli_select_db($connection, "lms"); 
	$name = ""; 
	$email = ""; 
	$mobile = ""; 
	$address = ""; // Initialize $address variable
	if(isset($_SESSION['email'])) { // Check if $_SESSION['email'] is set
		$query = "SELECT * FROM users WHERE email = '$_SESSION[email]'"; 
		$query_run = mysqli_query($connection, $query); 
		while ($row = mysqli_fetch_assoc($query_run)) { 
			$name = $row['name']; 
			$email = $row['email']; 
			$mobile = $row['mobile']; 
			$address = isset($row['address']) ? $row['address'] : ''; // Check if address is set
		} 
	} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>Dashboard</title> 
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"> <!-- Corrected typo in "initial" -->
	<link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head> 
<body> 
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
		<div class="container-fluid"> 
			<div class="navbar-header"> 
				<a class="navbar-brand" href="view_profile.php">Library Management System (LMS)</a> 
			</div> 
			<?php if(isset($_SESSION['name'])): ?>
				<span style="color: white"><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span>
			<?php endif; ?>
			<?php if(isset($_SESSION['email'])): ?>
				<span style="color: white"><strong>Email: <?php echo $_SESSION['email']; ?></strong></span>
			<?php endif; ?>
			<ul class="nav navbar-nav navbar-right"> 
				<li class="nav-item dropdown"> 
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a> 
					<div class="dropdown-menu"> 
						<a class="dropdown-item" href="view_profile.php">View Profile</a> 
						<div class="dropdown-divider"></div> 
						<a class="dropdown-item" href="edit_profile.php">Edit Profile</a> 
						<div class="dropdown-divider"></div> 
						<a class="dropdown-item" href="change_password.php">Change Password</a> 
					</div> 
				</li> 
				<li class="nav-item"> 
					<a class="nav-link" href="../logout.php">Logout</a> 
				</li> 
			</ul> 
		</div> 
	</nav><br> 
	<span><marquee>This is library management system. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br> 
	<center><h4>Student Profile Detail</h4><br></center> 
	<div class="row"> 
		<div class="col-md-4"></div> 
		<div class="col-md-4"> 
			<form> 
				<div class="form-group"> 
					<label for="name">Name:</label> 
					<input type="text" class="form-control" value="<?php echo $name; ?>" disabled> 
				</div> 
				<div class="form-group"> 
					<label for="email">Email:</label> 
					<input type="text" class="form-control" value="<?php echo $email; ?>" disabled> 
				</div> 
				<div class="form-group"> 
					<label for="mobile">Mobile:</label> 
					<input type="text" class="form-control" value="<?php echo $mobile; ?>" disabled> 
				</div> 
				<div class="form-group"> 
					<label for="address">Address:</label> 
					<input type="text" class="form-control" value="<?php echo $address; ?>" disabled> 
				</div> 
			</form> 
		</div> 
		<div class="col-md-4"></div> 
	</div> 
</body> 
</html>