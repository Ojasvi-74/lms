<?php
require("functions.php");
session_start();

// Optional: restrict access to admins only
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Library Management System</title>

    <!-- ✅ Bootstrap 5 -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">

    <!-- ✅ Custom styles -->
    <style>
        <?php include "styles.css"; ?>
    </style>
</head>

<body>
    <!-- ✅ Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="admin_dashboard.php">Library Management System (LMS)</a>
            
            <div class="d-flex align-items-center text-white">
                <span class="me-3"><strong>Welcome:</strong> <?php echo $_SESSION['name']; ?></span>
                <span class="me-3"><strong>Email:</strong> <?php echo $_SESSION['email']; ?></span>
            </div>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Profile
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="view_profile.php">View Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- ✅ Secondary Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="admin_dashboard.php">Dashboard</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Books</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="add_book.php">Add New Book</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="manage_book.php">Manage Books</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="add_cat.php">Add New Category</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="manage_cat.php">Manage Category</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Authors</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="add_author.php">Add New Author</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="manage_author.php">Manage Author</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="issue_book.php">Issue Book</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ✅ Dashboard Cards -->
    <div class="container mt-4">
        <div class="row g-4 justify-content-center">
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-dark text-white">Registered Users</div>
                    <div class="card-body">
                        <p class="card-text">Total Users: <strong><?php echo get_user_count(); ?></strong></p>
                        <a class="btn btn-danger" href="Regusers.php" target="_blank">View Users</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-dark text-white">Total Books</div>
                    <div class="card-body">
                        <p class="card-text">Books Available: <strong><?php echo get_book_count(); ?></strong></p>
                        <a class="btn btn-success" href="Regbooks.php" target="_blank">View Books</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-dark text-white">Book Categories</div>
                    <div class="card-body">
                        <p class="card-text">Total Categories: <strong><?php echo get_category_count(); ?></strong></p>
                        <a class="btn btn-warning" href="Regcat.php" target="_blank">View Categories</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-dark text-white">Books Issued</div>
                    <div class="card-body">
                        <p class="card-text">Total Issued: <strong><?php echo get_issue_book_count(); ?></strong></p>
                        <a class="btn btn-primary" href="view_issued_book.php" target="_blank">View Issued Books</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Bootstrap 5 JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>
</body>
</html>
