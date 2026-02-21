<?php
include '../../models/auth.php';
include_once '../../models/crud.php';


$edit_mode = false;

if(isset($_GET['edit'])){
    $edit_mode = $_GET['edit'];
    $header = "Edit";
    $submit = "Save";
    $mode = "editPost";
    $postId = $_GET['id'];

    $sql = "select * from posts where id=?";
    $data = [$postId];
    $post = query($sql,$data)->fetch();
    $title = $post['title'];
    $body = $post['body'];

}else{
    $header = "Create";
    $submit = "Publish";
    $mode = "publishPost";
    $postId = null;
    $title = 'Title';
    $body = 'Body text';
}

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

<!-- Navbar -->
    <div id="navbar-section">
        <?php include '../components/navbar.php' ?>
    </div>



<div class="d-flex flex-column mb-4 align-items-center">


    <div class="pt-4 px-4 w-100" style="max-width:768px;">
        <form id="createPostForm" action="../../models/crud_handler.php" method="post">
        <h1 class="mb-5"><?=$header?> Post</h1>
        <h3 id="title-input" class="border border-dark p-2 rounded" contenteditable="true" required><?=$title?></h3>
        <p id="body-input" class="border border-dark p-2" style="min-height:15rem;" contenteditable="true"><?=$body?></p>
        <input type="hidden" name="title" id="hidden-title">
        <input type="hidden" name="body" id="hidden-body">
        <input type="hidden" name="function" id="hidden-body" value="<?=$mode?>">
        <input type="hidden" name="id" id="hidden-body" value="<?=$postId?>">
        <button class="btn btn-secondary mt-3">Draft</button>
        <button class="btn btn-primary mt-3"><?=$submit?></button>
        </form>
    </div>
    
    
</div>

    


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ' crossorigin='anonymous'></script>
<script >
    $('#createPostForm').submit(function(e) {
    e.preventDefault();
    $('#hidden-title').val($('#title-input').html());
    $('#hidden-body').val($('#body-input').text());
    this.submit();
});
</script>

</body>
</html>