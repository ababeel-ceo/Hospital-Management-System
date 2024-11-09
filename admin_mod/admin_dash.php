<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Page</title>
<link href="bootstrap.min.css" rel="stylesheet">

<script src="bootstrap.bundle.min.js"></script>
<style>
	/* Custom style */
    .navbar{
        margin-bottom: 1rem;
    }
</style>
</head>
<body>
<div class="m-4">
      <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">ADMIN PANEL </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse5">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse5">
                <div class="navbar-nav">
                    <a href="../index.php" class="nav-item nav-link active">HOME</a>
                    <a href="add_hos.php" class="nav-item nav-link active">ADD HOSPITAL</a>
                    <a href="add_doc1.php" class="nav-item nav-link active">ADD DOCTOR</a>
                    <a href="#" class="nav-item nav-link active">REPORT</a>
                </div>    
            </div>
            <form action="logout.php" method="post">
		<div class="navbar-nav ms-auto">
                    <input  class="btn btn-outline-light" name="logout" type="submit" value="LOGOUT"/>
                </div>
            </form>
        </div>        
    </nav>

    
