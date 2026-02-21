<?php
$path = substr(str_replace('\\', '/', realpath(dirname(__FILE__).'/../../')), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))));

?>

<div class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="d-flex container-fluid">
    <!-- Global options -->
        <?php if (isset($enableOptions)) { ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navCollapse">
            <span class="navbar-toggler-icon shadow-none"></span>
        </button>
        <?php } ?>
        <a href="<?= $path ?>" class="navbar-brand">PORTFOLIO</a>
        <?php if (false) { ?>
        <div class="collapse navbar-collapse " id="navCollapse">
            <div id="nav-menu" class="navbar-nav">
                <a href="#Section 1" class="nav-link nav-item text-light">Section 1</a>
                <a href="#Section 2" class="nav-link nav-item text-light">Section 2</a>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- User options -->
    <div id="user-controls" style="position:absolute;top:15px;right:20px;">
        <?php
        if(isset($_SESSION['user_id'])) {
        ?>
        <a href="<?= $path.'/views/pages/createPost.php' ?>" class="text-decoration-none text-light">Create</a>
        <a href="#Notifications" class="text-decoration-none text-light px-4"><i class="fa-solid fa-bell"></i></a>
        <a href="<?= $path.'/models/auth.php?status=0' ?>" class="text-decoration-none text-light">Logout</a>
        <?php }else{ ?>
        <a href="<?= $path.'/views/pages/loginPage.php' ?>" class="text-decoration-none text-light">Login</a>
        <?php } ?>
    </div>
</div>