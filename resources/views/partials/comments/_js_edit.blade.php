$(document).on('click', '#commentEditButton', function() {

    commentModal.open();

    var commentId = $(this).val();
    var commentEditUrl = '/comments/'+commentId+'/edit';

    $.ajax({
        url : commentEditUrl,
        type: 'GET',
    })
    .done(function(response) {
        commentBody.val(response.comment.body);
        commentSaveButton.val(response.comment.id);
    });
});