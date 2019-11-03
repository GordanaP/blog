$(document).on('click', '#commentDeleteButton', function() {

    var commentId = $(this).val();
    var commentDeleteUrl = '/comments/'+commentId;

    $.ajax({
        type: 'DELETE',
        url: commentDeleteUrl
    })
    .done(function(response) {

        reloadLocation('#commentsList');
        reloadLocation('#mostCommentedArticles');
    });
});