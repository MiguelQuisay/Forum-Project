$('form.commentPostForm').focusin(function() {
    $('.reply-form').addClass('d-none');
    $('.comment-btns').removeClass('d-none');
    $('form:focus-within .comment-add').css('display', 'inline');
});

function cancelComment(e,postId) {
    $('.comment-add').css('display', 'none');
    $('#comment-box-'+postId).val('');

}

function submitComment(e,postId,replyId = null) {
    e.preventDefault();

    var postComment = $('#comment-box-'+postId).val() ?? '';
    var replyComment = $('#reply-box-'+replyId).val() ?? '';
    var commentText = postComment + replyComment;

    $.ajax({
        url: '../../models/crud_handler.php',
        method: 'POST',
        data: {
            post_id: postId,
            reply_id: replyId,
            comment: commentText,
            function:'submitComment'
        },
        dataType: 'text',
        success: function(response) {
            $('#comment-section').html(response);
        }
    });

    $('.comment-add').css('display', 'none');
    $('#comment-box-'+postId).val('');
    $('#comment-box-'+postId).blur();
}

function saveComment(e,postId,commentId) {
    e.preventDefault();

    var commentText = $('#edit-box-'+commentId).val() ?? '';

    $.ajax({
        url: '../../models/crud_handler.php',
        method: 'PUT',
        data: {
            id: commentId,
            post_id: postId,
            comment: commentText,
            function:'saveComment'
        },
        dataType: 'text',
        success: function(response) {
            $('#comment-section').html(response);
        }
    });

    $('.comment-add').css('display', 'none');
    $('#comment-box-'+postId).val('');
    $('#comment-box-'+postId).blur();
}

function deleteComment(postId,commentId) {
    $.ajax({
        url: '../../models/crud_handler.php',
        method: 'PUT',
        data: {
            id: commentId,
            post_id: postId,
            function:'deleteComment'
        },
        dataType: 'text',
        success: function(response) {
            $('#comment-section').html(response);
        }
    });

}

function showReplyForm(commentId) {
    $('form.commentPostForm input').val('');
    $('.reply-form').addClass('d-none');
    $('.comment-btns').removeClass('d-none');
    $('.comment-add').css('display', 'none');


    $('#comment-id-'+commentId+' .reply-form').removeClass('d-none');
    $('#comment-id-'+commentId+' .comment-btns').addClass('d-none');
    $('#reply-box-'+commentId).focus();
}

function showEditForm(commentId) {
    $('form.commentPostForm input').val('');
    $('.edit-form').addClass('d-none');
    $('#comment-body-'+commentId).addClass('d-none');
    $('.comment-btns').removeClass('d-none');
    $('.comment-add').css('display', 'none');


    $('#comment-id-'+commentId+' .edit-form').removeClass('d-none');
    $('#comment-id-'+commentId+' .comment-btns').addClass('d-none');
    $('#edit-box-'+commentId).focus();
    $('#edit-box-'+commentId).val($('#comment-body-'+commentId+' p').text());
}

function cancelReply(e, commentId) {
    $('#comment-id-'+commentId+' .reply-form').addClass('d-none');
    $('#comment-id-'+commentId+' .comment-btns').removeClass('d-none');
    $('#reply-box-'+commentId).val('');
}

function cancelEdit(e, commentId) {
    $('#comment-id-'+commentId+' .edit-form').addClass('d-none');
    $('#comment-id-'+commentId+' .comment-btns').removeClass('d-none');
    $('#comment-body-'+commentId).removeClass('d-none');
    $('#edit-box-'+commentId).val('');
}

function deletePost(post_id){
    console.log("delete post...");
    $.ajax({
        url: '../../models/crud_handler.php',
        method: 'PUT',
        data: {
            id: post_id,
            function:'deletePost'
        },
        dataType: 'text',
        success: function(response) {
            eval(response);
        }
    });
}