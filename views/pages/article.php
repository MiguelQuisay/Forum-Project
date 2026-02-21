<?php   

include '../../models/config.php';
include '../../models/auth.php';
include_once '../../models/crud.php';
include '../../models/transform.php';

$postID = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id=?";
$post = array(query($sql,[$postID])->fetch());
$post = bindAuthor($post)[0];

$time = interval(new DateTime($post['created_at']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
<!-- Main container -->
<div class="main-container d-flex flex-column dvh-100">
    <!-- Navbar -->
    <div id="navbar-section">
        <?php include '../../views/components/navbar.php' ?>
    </div>

    <!-- Content Container -->
<div class="content-container flex-grow-1">
    <div class="row h-100 m-0">
    <div class="sidepanel col-md-2 h-100"></div>
    <div class="col-md-7 p-4 border-start border-end border-dark h-100">
    <?php if($post) { ?>
    <!-- title & options -->
    <div class="d-flex flex-row justify-content-between">
        <h1 id="article-title-<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></h1>
            <div class="dropdown mt-2">
                <button type="button" class="btn  btn-outline-onhover btn-sm shadow-none" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                <ul class="dropdown-menu"  >
                    <li><a tabindex="-1" href="javascript:void(0)" onclick="window.location.href='createPost.php?edit=true&id=<?= $post['id'] ?>'" class="dropdown-item">edit</a></li>
                    <li><a tabindex="-1" href="javascript:void(0)" onclick="deletePost(<?= $post['id'] ?>)" class="dropdown-item">delete</a></li>
                </ul>
            </div>
    </div>
    <!-- author & post date -->
    <p><?= htmlspecialchars($post['author']) ?> <span> • <?= $time ?></span></p>
    <!-- post body -->
    <p class="content"><?= htmlspecialchars($post['body']) ?></p>
    
    <!-- <a href="#" class="text-decoration-none" style="color: gray">Comments <span>0</span> <i class="fa-solid fa-caret-down"></i></a> -->
    <!-- Add comment box -->
    <form class="commentPostForm" id="comment-form-<?= $post['id'] ?>" action="" onSubmit="submitComment(event,<?= $post['id'] ?>)">
        <input id="comment-box-<?= $post['id'] ?>" name="comment" type="text" class="form-control my-2" placeholder="Add comment...">
        <div class="container-fluid px-0 comment-add">
            <button type="button" class="btn btn-primary btn-sm shadow-none" onclick="submitComment(event,<?= $post['id'] ?>)">Comment</button>
            <button type="button" class="btn btn-outline-secondary btn-sm shadow-none" onclick="cancelComment(event,<?= $post['id'] ?>)">Cancel</button>
        </div>
    </form>
    <!-- comment display -->
    <div id="comment-section">
        <?php include '../components/display-comments.php' ?>
    </div>
    <hr>
    <?php }else{ ?>
        <p>Post not found.</p>
    <?php } ?>
    </div>
    </div>
    <div class="sidepanel col-md-3 h-100"></div>

</div>
</div>
    


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ' crossorigin='anonymous'></script>
<script src="../../js/comments.js"></script>

</body>
</html>