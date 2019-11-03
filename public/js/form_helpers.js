function clearErrorOnNewInput()
{
    $("input, textarea").on('keydown', function () {
        clearError(errorBox($(this).attr('name')));
        clearError(errorBox($(this).attr('name'), 'p.'));
    });
}

function displayErrors(errors)
{
    for (error in errors) {
        var errorMessage = errors[error][0];
        displayError(errorBox(error), errorMessage);
    }
}

function clearErrors(fields)
{
    $.each(fields, function(index, name) {
        clearError(errorBox(name))
    });
}

function displayError(field, message)
{
    field.show().text(message);
}

function clearError(field)
{
    field.hide().text('');
}

function reloadLocation(location)
{
    $(location).load(' '+location );
}

function errorBox(name, tag = 'span.')
{
    return $(tag+name);
}

function clearForm()
{
    $("form").trigger('reset');
}

function redirectTo(url)
{
    location.href = url;
}