<?php
session_start();

// Check if name and email are set in the session
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

function get_user_issue_book_count(){
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $user_issue_book_count = 0;

    // Check if 'id' index is set in $_SESSION
    if(isset($_SESSION['id'])) {
        $student_id = $_SESSION['id'];

        // Prepare the SQL query with a placeholder for the student id to prevent SQL injection
        $query = "SELECT COUNT(*) AS user_issue_book_count FROM issued_books WHERE student_id = ?";
        
        // Prepare the statement
        $stmt = mysqli_prepare($connection, $query);
        
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "i", $student_id);
        
        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the row
        $row = mysqli_fetch_assoc($result);

        // Check if a row was returned
        if($row) {
            $user_issue_book_count = $row['user_issue_book_count'];
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    return $user_issue_book_count;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>  
</head>
<style type="text/css">
    body{
        background: rgba(245, 245, 245, 0.4);
        background-image: url("https://img.freepik.com/free-photo/abundant-collection-antique-books-wooden-shelves-generated-by-ai_188544-29660.jpg?size=626&ext=jpg&ga=GA1.1.1546980028.1704240000&semt=sph");
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
        </div>
        <!-- Output name and email if they are set -->
        <font style="color: white"><span><strong>Welcome: <?php echo $name;?></strong></span></font>
        <font style="color: white"><span><strong>Email: <?php echo $email;?></strong></font>
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
</nav>
<div class="row">
    <div class="col-md-3" style="margin: 25px">
        <div class="card bg-light" style="width: 300px">
            <div class="card-header">Book Issued</div>
            <div class="card-body">
                <p class="card-text">No of book issued: <?php echo get_user_issue_book_count();?></p>
                <a class="btn btn-success" href="view_issued_book.php">View Issued Books</a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
</div>
</body>
</html>
