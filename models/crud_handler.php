<?php
include 'crud.php';
include 'transform.php';
include 'auth.php';

$auth_comments = false;
$auth_posts = false;
$auth_user = false;

$data = file_get_contents("php://input");
parse_str($data, $_DATA);

if(isset($_DATA['id'])){
    $auth_comments = $auth->authorize($_DATA['id'],"comments") ?? false;
    $auth_posts = $auth->authorize($_DATA['id'],"posts") ?? false;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        break;
    case 'POST':
        //Submit Comment
        if($_POST['function']==='submitComment'){
            submitComment($_POST);
            $postID = $_POST['post_id'];
            include_once '../views/components/display-comments.php';
        }

        if($_POST['function']==='publishPost'){
            publishPost($_POST);
            header('location: ../index.php');
        }

        if($_POST['function']==='editPost' ){
            if($auth_posts){
                editPost($_POST);
                header('location: ../index.php');   
            }else{
                echo "Unauthorized action.";
            }
        }

        break;
    case 'PUT':
        $put_data = file_get_contents("php://input");
        parse_str($put_data, $_PUT);
        if($_PUT['function']==='saveComment'){
            if($auth_comments){
                saveComment($_PUT);
                $postID = $_PUT['post_id'];
                include_once '../views/components/display-comments.php';
            }else{
                echo "Unauthorized action.";
            }

        }
        if($_PUT['function']==='deleteComment'){
            if($auth_comments){
            deleteComment($_PUT);
            $postID = $_PUT['post_id'];
            include_once '../views/components/display-comments.php';
            }else{
                echo "Unauthorized action.";
            }
        }
        if($_PUT['function']==='deletePost'){
            if($auth_posts){
                deletePost($_PUT);
                echo "window.location.href='../../index.php'";
                exit;
            }else{
                echo "Unauthorized action.";
            }
        }


        break;
    case 'DELETE':
        $delete_data = file_get_contents("php://input");
        parse_str($delete_data, $_DELETE);

        break;
    default:
        http_response_code(405);
        die();
}