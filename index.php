<?php
include 'models/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- Main container -->
<div class="main-container d-flex flex-column dvh-100">
    <!-- Navbar -->
    <div id="navbar-section">
        <?php include 'views/components/navbar.php' ?>
    </div>

    <!-- Content Container -->
        <div class="content-container flex-grow-1">
            <div class="row h-100 m-0">
        <!-- Left Panel -->
            <div class="sidepanel col-md-2 h-100">
            </div>

        <!-- Article Preview Feed -->
            <div class="col-md-7 h-100 border-start border-end border-dark p-0">
                <div id="article-preview-feed">
                            <?php include 'views/components/navbar.php' ?>

                </div>
            </div>

        <!-- Right Panel -->
            <div class="sidepanel col-md-3 h-100">
            </div>


            </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ' crossorigin='anonymous'></script>
<script src="js/scripts.js"></script>

</body>
</html>