<?php

function interval($start_time){

    $end_time = new DateTime(); // Current time

    // Calculate the difference, which returns a DateInterval object
    $interval = $start_time->diff($end_time);
    if($interval->y > 0) {
        return $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ago";
    } else if($interval->m > 0) {
        return $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ago";
    } else if($interval->d > 0) {
        return $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ago";
    } else if($interval->h > 0) {
        return $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
    } else if($interval->i > 0) {
        return $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
    } else {
        return $interval->s . " second" . ($interval->s > 1 ? "s" : "") . " ago";
    }
    
}

function organizeComments($comments) {
    $indices = [];
    //make index of comment id's
    foreach($comments as $comment) {
        array_push($indices, $comment['id']);
    }
    //push all replies to each comment
    for($i = 0; $i < count($comments); $i++) {
        $comment = $comments[$i];
        $index = array_search($comment['reply_id'], $indices);

        if($comment['reply_id'] !== 0) {
        $comments[$index]['replies'][] = $comment;
        }
    }
    //remove non-top level comments
    foreach($comments as $key => $comment) {
        $index = array_search($comment['reply_id'], $indices);
        if($comment['reply_id'] !== 0) {
            unset($comments[$key]);
        }   
    }
    return $comments;
}  

