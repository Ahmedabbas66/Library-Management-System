<?php 
	session_start(); 
	#fetch data from database 
	$connection = mysqli_connect("localhost","root",""); 
	$db = mysqli_select_db($connection,"lms"); 
	$book_name = ""; 
	$author = ""; 
	$book_no = ""; 
	$student_name = ""; 
	$query = "select issued_books.book_name,issued_books.book_author,issued_books.book_no,users.name from issued_books left join users on issued_books.student_id = users.id where issued_books.status = 1"; 
?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>Issued Books</title> 
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1"> 
	<link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> 
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
	<span><marquee>This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br> 
		<center><h4>Issued Book's Detail</h4><br></center> 
		<div class="row"> 
			<div class="col-md-2"></div> 
			<div class="col-md-8"> 
				<form> 
					<table class="table-bordered" width="900px" style="text-align: center"> 
						<tr> 
							<th>Name</th> 
							<th>Author</th> 
							<th>Number</th> 
							<th>Student Name</th> 
						</tr> 
				
					<?php 
						$query_run = mysqli_query($connection,$query); 
						while ($row = mysqli_fetch_assoc($query_run)){ 
							?> 
							<tr> 
							<td><?php echo $row['book_name'];?></td> 
							<td><?php echo $row['book_author'];?></td> 
							<td><?php echo $row['book_no'];?></td> 
							<td><?php echo $row['name'];?></td> 
						</tr> 

					<?php 
						} 
					?>	 
				</table> 
				</form> 
			</div> 
			<div class="col-md-2"></div> 
		</div> 
</body> 
</html> 
