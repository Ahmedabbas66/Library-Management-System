<!DOCTYPE html> 
<html> 
<head> 
	<title>LMS</title> 
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1"> 
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head> 
<style type="text/css"> 
	#main_content{ 
		background: rgba(245, 245, 245, 0.9); 
		padding: 50px; 
	} 
	#side_bar{ 
		background: rgba(245, 245, 245, 0.9); 
		padding: 50px; 
	} 
	body{ 
	background: rgba(245, 245, 245, 0.4); 
	background-image: url("https://img.freepik.com/free-photo/abundant-collection-antique-books-wooden-shelves-generated-by-ai_188544-29660.jpg?size=626&ext=jpg&ga=GA1.1.1546980028.1704240000&semt=sph"); 
} 
</style> 
<body> 
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
		<div class="container-fluid"> 
			<div class="navbar-header"> 
				<a class="navbar-brand" href="index.php">Library Management System</a> 
			</div> 
			<ul class="nav navbar-nav navbar-right"> 
				<li class="nav-item"> 
				<a class="nav-link" href="index.php">User Login</a> 
				</li> 
			<li class="nav-item"> 
				<a class="nav-link" href="admin/indexad.php">Admin Login</a> 
			</li> 
			<li class="nav-item"> 
				<a class="nav-link" href="signup.php"></span>Signup</a> 
			</li> 
			</ul> 
		</div> 
	</nav> 
	<div class="row"> 
		<div class="col-md-4" id="side_bar"> 
			<h5>Today's Quote</h5> 
			<h6>“There is more treasure in books than in all the pirate's loot on Treasure Island"</h6> 
			<p>~ Walt Disney</p> 
			<h5>Library Timing</h5> 
			<ul> 
				<li>Opening: 9:00 AM</li> 
				<li>Closing: 12:00 PM</li> 
			</ul> 
			<h5>What We provide ?</h5> 
			<ul> 
				<li>AC Rooms</li> 
				<li>Free Wi-fi</li> 
				<li>Learning Environment</li> 
				<li>Discussion Room</li> 
				<li>Free Electricity</li> 
			</ul> 
		</div> 
		<div class="col-md-8" id="main_content"> 
			<center><h3><u>User Registration Form</u></h3></center> 
			<form action="register.php" method="post"> 
				<div class="form-group"> 
					<label for="name">Full Name:</label> 
					<input type="text" name="name" class="form-control" required> 
				</div> 
				<div class="form-group"> 
					<label for="email">Email ID:</label> 
					<input type="text" name="email" class="form-control" required> 
				</div> 
				<div class="form-group"> 
					<label for="password">Password:</label> 
					<input type="password" name="password" class="form-control" required> 
				</div> 
				<div class="form-group"> 
					<label for="mobile">Mobile:</label> 
					<input type="text" name="mobile" class="form-control" required> 
				</div> 
				<div class="form-group"> 
					<label for="address">Address:</label> 
					<textarea name="address" class="form-control" required></textarea> 
				</div> 
				<button type="submit" class="btn btn-primary">Register</button>	 
			</form> 
		</div> 
	</div> 
</body> 
</html>
