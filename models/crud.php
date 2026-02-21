<?php

include 'config.php';


function query($sql, $data=null) {
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    return $stmt;
}

function retrievePosts(){
    $sql = "select * from posts";
    return query($sql)->fetchAll();
}

function bindAuthor($rows) {
    global $db;
    $namedRows = [];
    foreach($rows as $key=>$row) {
    $sql = 'select username from users where id=?';
    $data = [$row['creator_id']];
    $author = query($sql, $data)->fetchColumn();
    $newRow = $row;
    $newRow['author'] = $author;
    $rows[$key] = $newRow;
    }
    return $rows;
}

function submitComment($array){
    $sql = 'insert into comments (post_id, reply_id, comment, creator_id) values (?,?,?,?)';
    $data = [$array['post_id'], $array['reply_id'], $array['comment'], $_SESSION['user_id']];
    query($sql, $data);
}

function saveComment($array){
    $sql = 'update comments set comment=? where id=?';
    $data = [$array['comment'], $array['id']];
    query($sql, $data);
}

function deleteComment($array){
    $sql = 'update comments set comment=? where id=?';
    $data = ['(comment has been deleted.)', $array['id']];
    query($sql, $data);
}

function publishPost($array){
    $sql = 'insert into posts (title,body,creator_id) values (?,?,?)';
    $data = [$array['title'], $array['body'], $_SESSION['user_id']];
    query($sql, $data);
}

function deletePost($array){
    $sql = 'update posts set title=?, body=? where id=?';
    $data = ['(post has been deleted.)', 'sorry, post deleted. :(',$array['id']];
    query($sql, $data);
}

function editPost($array){
    $sql = 'update posts set title=?, body=? where id=?';
    $data = [$array['title'],$array['body'],$array['id']];
    query($sql, $data);
}