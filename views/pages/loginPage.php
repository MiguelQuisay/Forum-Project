<?php
include '../../models/auth.php';

//variables
$loginId = $_SESSION['loginId'] ?? '';
$loginPass = $_SESSION['loginPass'] ?? '';
$userIsInvalid = isset($_SESSION['error']['loginId']) ? 'is-invalid' : '';
$passIsInvalid = isset($_SESSION['error']['password']) ? 'is-invalid' : '';
$userError = $_SESSION['error']['loginId'] ?? '';
$passError = $_SESSION['error']['password'] ?? '';

$regUserIsInvalid = isset($_SESSION['error']['reg_name']) ? 'is-invalid' : '';
$regEmailIsInvalid = isset($_SESSION['error']['reg_email']) ? 'is-invalid' : '';
$regNameError = $_SESSION['error']['reg_name'] ?? '';
$regEmailError = $_SESSION['error']['reg_email'] ?? '';

//clear session variables
$_SESSION['error'] = [];
$_SESSION['loginId'] = ''; 
$_SESSION['loginPass'] = ''; 

$isRegister = $_GET['register'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <style>
        .content {
            text-align: justify !important;
        }

        .comment-add {
            display: none;
        }


        .dropdown-menu {
        max-width: 100px;
        min-width: 1%;
        }
    </style>
</head>
<body>
<div class="d-flex flex-column" style="height: 100dvh;">

    <!-- Navbar -->
    <div id="navbar-section">
        <?php include '../components/navbar.php' ?>
    </div>

    <div class="d-flex justify-content-center align-items-center flex-grow-1">
        
            <div id="loginForm" class="bg-light border rounded p-3" style="width: 400px;">
                <h3 class="text-center">Login</h3>
                <form action="../../models/auth.php" method="post">
                    <div class="mb-3">
                    <input type="text" name="loginId" class="form-control <?= $userIsInvalid ?>" placeholder="email or username" value="<?= $loginId ?>" required>
                    <div class="invalid-feedback"><?= $userError ?></div>
                    </div>
                    <div class="mb-3">
                    <input type="password" name="password" class="form-control <?=$passIsInvalid ?>" placeholder="password" value="<?= $loginPass ?>"required>
                    <div class="invalid-feedback"><?= $passError ?></div>
                    </div>
                    <input type="hidden" name="function" value="login">
                    <button type="submit" class="form-control btn btn-primary">Login</button>
                    <p class="mt-3 text-center">Don't have an account yet? <a id="registerLink" class="text-decoration-none" href="javascript:void(0)">Register</a></p>
                </form>
            </div>

            <div id="registerForm" class="bg-light border rounded p-3 d-none" style="width: 400px;">
                <h3 class="text-center">Register</h3>
                <form action="../../models/auth.php" method="post">
                    <div class="mb-3">
                    <input type="text" name="email" class="form-control <?=$regEmailIsInvalid ?>" placeholder="email" required>
                    <div class="invalid-feedback"><?=$regEmailError ?></div>
                    </div>
                    <div class="mb-3">
                    <input type="text" name="username" class="form-control <?=$regUserIsInvalid ?>" placeholder="username" required>
                    <div class="invalid-feedback"><?=$regNameError ?></div>
                    </div>
                    <input type="password" name="password" class="form-control mb-3" placeholder="password" required>
                    <input type="hidden" name="function" value="register">
                    <button type="submit" class="form-control btn btn-primary" >Register</button>
                    <p class="mt-3 text-center">Already have an account? <a id="loginLink" class="text-decoration-none" href="loginPage.php">Login</a></p>
                </form>
            </div>

        
         </div>
</div>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ' crossorigin='anonymous'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$('#registerLink').click(function(e){
e.preventDefault();
$('#loginForm').addClass('d-none');
$('#registerForm').removeClass('d-none');
});

$('#loginLink').click(function(e){
e.preventDefault();
$('#registerForm').addClass('d-none');
$('#loginForm').removeClass('d-none');
});

$('input.is-invalid').on('input',function(){
$(this).removeClass('is-invalid');
console.log(1234567);
});

<?php if($isRegister) { ?>
$('#loginForm').addClass('d-none');
$('#registerForm').removeClass('d-none');
<?php } ?>
</script>
</body>
</html>