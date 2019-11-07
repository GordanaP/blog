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

function toggleHiddenElementByCheckedInput(inputType, checkedValue, hiddenElement, errorField)
{
    $("input:"+inputType).change(function() {

        if(getCheckedValue(inputType) == checkedValue) {
            showElement(hiddenElement)
        }
        else
        {
            hideElement(hiddenElement)
            resetInput(hiddenElement)
            emptyElement(errorField)
        }
    });

    if (! isEmptyElement( errorField )) {
        showElement(hiddenElement);
        checkInput(inputType);
    }
}

function hideElement(el)
{
    el.addClass('hidden')
}

function showElement(el)
{
    el.removeClass('hidden')
}

function emptyElement(el)
{
    el.empty();
}

function resetInput(input)
{
    input.val('');
}

function checkInput(inputType)
{
    $("input:"+inputType).prop("checked", true);
}

function isEmptyInput( input )
{
    return input.val() == '';
}

function isEmptyElement( el )
{
    return ! $.trim(el.html());
}

function getCheckedValue(inputType)
{
    return $("form input[type='"+inputType+"']:checked").val();
}