<?php 

include '../../models/config.php';
include '../../models/crud.php';
include '../../models/transform.php';

$posts = retrievePosts();
$posts = bindAuthor(array_reverse($posts));

foreach($posts as $post) { 
$time = interval(new DateTime($post['created_at']));
?>

<div class="article-preview" onclick="window.location.href='views/pages/article.php?id=<?php echo $post['id']; ?>'">
    <div class="d-flex flex-row justify-content-between">
    <h1 id="article-title-<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></h1>
    </div>
    <p><?= htmlspecialchars($post['author']) ?><span> • <?= $time ?></span></p>
    <p class="content"><?php echo htmlspecialchars(substr($post['body'], 0, 200)."..."); ?></p>
</div>
<hr class="m-0">


<?php } ?>