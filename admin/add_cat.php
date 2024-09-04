<?php 
	require("functions.php"); 
	session_start(); 
	#fetch data from database 
	$connection = mysqli_connect("localhost","root",""); 
	$db = mysqli_select_db($connection,"lms"); 
	$name = ""; 
	$email = ""; 
	$mobile = ""; 
	$query = "select * from admins where email = '$_SESSION[email]'"; 
	$query_run = mysqli_query($connection,$query); 
	while ($row = mysqli_fetch_assoc($query_run)){ 
		$name = $row['name']; 
		$email = $row['email']; 
		$mobile = $row['mobile']; 
	} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>Add New Category</title> 
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1"> 
	<link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> 
	<script type="text/javascript"> 
		function alertMsg(){ 
			alert(Book added successfully...); 
			window.location.href = "admin_dashboard.php"; 
		} 
	</script> 
</head> 
<body> 
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
		<div class="container-fluid"> 
			<div class="navbar-header"> 
				<a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a> 
			</div> 
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font> 
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font> 
			<ul class="nav navbar-nav navbar-right"> 
			<li class="nav-item dropdown"> 
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a> 
				<div class="dropdown-menu"> 
					<a class="dropdown-item" href="">View Profile</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="#">Edit Profile</a> 
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
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd"> 
		<div class="container-fluid"> 
			
			<ul class="nav navbar-nav navbar-center"> 
			<li class="nav-item"> 
				<a class="nav-link" href="admin_dashboard.php">Dashboard</a> 
			</li> 
			<li class="nav-item dropdown"> 
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Books </a> 
				<div class="dropdown-menu"> 
					<a class="dropdown-item" href="add_book.php">Add New Book</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="manage_book.php">Manage Books</a> 
				</div> 
			</li> 
			<li class="nav-item dropdown"> 
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category </a> 
				<div class="dropdown-menu"> 
					<a class="dropdown-item" href="add_cat.php">Add New Category</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="manage_cat.php">Manage Category</a> 
				</div> 
			</li> 
			<!-- <li class="nav-item dropdown"> 
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Authors</a> 
				<div class="dropdown-menu"> 
					<a class="dropdown-item" href="add_author.php">Add New Author</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="manage_author.php">Manage Author</a> 
				</div> 
			</li>  -->
			<li class="nav-item"> 
				<a class="nav-link" href="issue_book.php">Issue Book</a> 
			</li> 
			</ul> 
		</div> 
	</nav><br> 
	<center><h4>Add a new Category</h4><br></center> 
		<div class="row"> 
			<div class="col-md-4"></div> 
			<div class="col-md-4"> 
				<form action="" method="post"> 
					<div class="form-group"> 
						<label for="name">Category Name:</label> 
						<input type="text" class="form-control" name="cat_name" required> 
					</div> 
					<button type="submit" name="add_cat" class="btn btn-primary">Add Catogry</button> 
				</form> 
			</div> 
			<div class="col-md-4"></div> 
		</div> 
</body> 
</html> 

<?php 
	if(isset($_POST['add_cat'])) 
	{ 
		$connection = mysqli_connect("localhost","root",""); 
		$db = mysqli_select_db($connection,"lms"); 
		$query = "insert into category values('','$_POST[cat_name]')"; 
		$query_run = mysqli_query($connection,$query); 
		header("Location:admin_dashboard.php"); 
	} 
?> 