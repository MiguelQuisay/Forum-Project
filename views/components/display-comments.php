<?php
//note: specify $postID

$sql = "SELECT * FROM comments WHERE post_id =? ORDER BY created_at desc";
$comments = query($sql, [$postID])->fetchAll();
$comments = bindAuthor($comments);
?>
<div class="comment-feed">
<?php 
//recurseive comment display
function displayComments($organizedComments){
    foreach($organizedComments as $comment){
        $time = interval(new DateTime($comment['created_at']));
        if(isset($comment['comment'])) { ?>
        <div id="comment-id-<?= htmlspecialchars($comment['id']) ?>" class="mt-3">
            <!-- author/date -->
            <div class="comment-details">   
                <p class="mb-0"><span class="p-1 px-2 rounded" style="background-color:lightCyan;color:royalBlue"><?= htmlspecialchars($comment['author']) ?></span> <span style="color:gray"><?= htmlspecialchars($time) ?></span></p>
            </div>
            <!-- comment body-->
            <div id="comment-body-<?= $comment['id'] ?>" class="comment-content">
                <p class="mb-1"><?= htmlspecialchars($comment['comment']) ?></p>
            </div>
            <!-- comment box -->
            <form action="" class="reply-form d-none">
                <input id="reply-box-<?= $comment['id'] ?>" type="text" class="form-control my-2" placeholder="Add comment...">
                <div class="container-fluid px-0">
                    <button type="button" class="btn btn-primary btn-sm shadow-none" onclick="submitComment(event,<?= $comment['post_id'] ?>,<?= $comment['id'] ?>)">Reply</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm shadow-none" onclick="cancelReply(event,<?= $comment['id'] ?>)">Cancel</button>
                </div>
            </form>
            <!-- edit box -->
            <form action="" class="edit-form d-none">
                <input id="edit-box-<?= $comment['id'] ?>" type="text" class="form-control my-2" placeholder="Edit comment...">
                <div class="container-fluid px-0">
                    <button type="button" class="btn btn-primary btn-sm shadow-none" onclick="saveComment(event,<?= $comment['post_id'] ?>,<?= $comment['id'] ?>)">Save</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm shadow-none" onclick="cancelEdit(event,<?= $comment['id'] ?>)">Cancel</button>
                </div>
            </form>
            <!-- buttons -->
            <div class="comment-btns container-fluid px-0">
                <button class="btn btn-outline-secondary btn-sm shadow-none">react</button>
                <button type="button" class="btn btn-outline-secondary btn-sm shadow-none" onclick="showReplyForm(<?= $comment['id'] ?>)">comment</button>
                <div class="dropdown d-inline">
                    <button type="button" class="btn btn-outline-secondary btn-sm shadow-none" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis"></i></button>
                    <ul class="dropdown-menu"  >
                        <li><a tabindex="-1" href="javascript:void(0)" onclick="showEditForm(<?= $comment['id'] ?>)" class="dropdown-item">edit</a></li>
                        <li><a tabindex="-1" href="javascript:void(0)" onclick="deleteComment(<?= $comment['post_id'] ?>,<?= $comment['id'] ?>)" class="dropdown-item">delete</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <?php }
        
        echo "<div class='ms-5'>";
        if(isset($comment['replies'])) {
        displayComments($comment['replies']);
        }
        echo "</div>";
    }
}
//run displayComments
displayComments(organizeComments($comments));
 ?>
<!-- Comment feed options -->
<div class="comment-feed-options mt-2">
    <span><a href="#" class="text-decoration-none">Add comment</a></span>
    <span> | </span>
    <span><a href="#" class="text-decoration-none">Show more comments</a></span>
</div>