$(document).ready(function(){

populateArticles();

});

function populateArticles(){
    $.ajax({
        url: 'views/components/article-previews.php',
        method: 'get',
        dataType: 'text',
        success: function(res){
            $('#article-preview-feed').html(res);
        }
    })
}