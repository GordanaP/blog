$(document).on('click', '#commentSaveButton', function() {

    var commentId = $(this).val();
    var commentUpdateUrl = '/comments/'+commentId;

    $.ajax({
        type: 'PUT',
        url: commentUpdateUrl,
        data: {
            body: commentBody.val()
        },
    })
    .done(function(response) {
        commentModal.close();
        reloadLocation("#body-"+response.comment.id);
    })
    .fail(function(response) {

        displayErrors(response.responseJSON.errors);
    });
});