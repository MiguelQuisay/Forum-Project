<?php
include 'config.php';
include_once 'crud.php';
$path = substr(str_replace('\\', '/', realpath(dirname(__FILE__).'/../')), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))));
$loginPage = $path."/views/pages/loginPage.php";

session_start();

class Auth {

    public function __construct(){

    }

    public function registerUser($email, $username, $password){
        global $path, $loginPage;
        //check if email or username is already in use
        $sql = "select username from users where username=?";
        $reg_name = query($sql, [$username])->fetchColumn();

        $sql = "select email from users where email=?";
        $reg_email = query($sql, [$email])->fetchColumn();

        if($reg_name){
            $_SESSION['error']['reg_name']="Username already taken.";
        }
        if($reg_email){
            $_SESSION['error']['reg_email']="Email already registered.";
        }
        if(isset($_SESSION['error'])){
            header( "Location: $loginPage.?register=true");
            exit;
        }



        //proceed
        $sql = "insert into users (username, email, password) values (?,?,?)";
        $data = [$username, $email, password_hash($password, PASSWORD_DEFAULT)];
        query($sql, $data);
        header( "Location: $path");
        exit;
    }

    public function loginUser($userLogin, $password){
        global $path, $loginPage;
        $_SESSION['loginId'] = $userLogin;
        $sql = "select * from users where username=? or email=?";
        $user = query($sql,[$userLogin,$userLogin])->fetch();
        // $_SESSION['error'] = [];

        if(!$user) {
            $_SESSION['error'] = ['loginId' => "Username or email not found."];
            header( "Location: $loginPage");
            exit;
        }

        if(password_verify($password,$user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
        }else{
            $_SESSION['error'] = ['password' => "Incorrect password."];
            $_SESSION['loginPass'] = $password; 
            header( "Location: $loginPage"); 
            exit;
        }

        header( "Location: $path");
        exit;
    }

    public function logoutUser(){
        global $path;
        session_unset();
        $_SESSION = [];
        session_destroy();
        header( "Location: $path");
        exit;
    }

    public function authorize($id, $type){
        $sql = "select creator_id from `$type` where id=?";
        $object = query($sql,[$id])->fetchColumn();
        if($object === $_SESSION['user_id']){
            return true;
        }else{
            return false;
        }
    }
}

$auth = new Auth();
// echo "<script>console.log(".json_encode($_POST).")</script>";

if(isset($_POST['function'])){
    if($_POST['function']==='login'){
        $auth->loginUser($_POST['loginId'],$_POST['password']);
    }
    if($_POST['function']==='register'){
        $auth->registerUser($_POST['email'],$_POST['username'],$_POST['password']);
    }
}

if(isset($_GET['status'])){
    if($_GET['status'] == 0){
        $auth->logoutUser();
    }
}