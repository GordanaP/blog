function deleteSingleRecord(records, datatable)
{
    $(document).on('click', deleteSingle(records), function() {

        var record = $(this).attr('data-record');

        $.ajax({
            type: 'DELETE',
            url: deleteUrl(records, record),
            success: function(response) {
                countDataTableRows(datatable) == 1
                    ? reloadLocation(getLocation(records))
                    : reloadDataTable(datatable);
            }
        });
    });
}

function deleteManyRecords(records, datatable)
{
    $(document).on('click', deleteMany(records), function() {
        $.ajax({
            type: 'DELETE',
            url: deleteUrl(records),
            data: {
                ids: getCheckedValues(records.toLowerCase())
            },
            success: function(response) {
                countDataTableRows(datatable) == 1 || noneChecked(records.toLowerCase())
                    ? reloadLocation(getLocation(records))
                    : reloadDataTable(datatable);

                deleteButton(records).hide();
                uncheck($(checkAll(records)));
            }
        });
    });
}

function markCheckboxes(records)
{
    var table = $('#table'+records);
    var singleCheckbox = '.checkitem'+records

    table.on('click', checkAll(records), function () {

        $(singleCheckbox).prop('checked', $(this).prop("checked"));
        deleteButton(records).show();

        if(isNotChecked($(this))) {
            deleteButton(records).hide();
        }
    });

    table.on('click', singleCheckbox, function () {

        if(isChecked($(this))) {
            deleteButton(records).show();
        }

        if(isNotChecked($(this))) {
            uncheck($(checkAll(records)))
        }

        if(allChecked(singleCheckbox)) {
            check($(checkAll(records)))
        }

        if(noneChecked(records.toLowerCase())) {
            deleteButton(records).hide();
        }
    });
}

function isChecked(checkbox)
{
    return checkbox.prop("checked") == true;
}

function isNotChecked(checkbox)
{
    return checkbox.prop("checked") == false;
}

function check(checkbox)
{
    return checkbox.prop('checked', true);
}

function uncheck(checkbox)
{
    return checkbox.prop('checked', false);
}

function checkAll(records)
{
    return '#checkAll'+records;
}

function allChecked(checkbox)
{
    return $(checkbox+":checked").length == $(checkbox).length
}

function noneChecked(checkbox)
{
    return countChecked(checkbox) == 0
}

function getCheckedValue(inputType)
{
    return $("form input[type='"+inputType+"']:checked").val();
}

function getCheckedValues(checkboxName)
{
    var values = [];

    $('input[name*="' + checkboxName + '"]:checked').each(function() {
       values.push($(this).val());
    });

    return values;
}

function countChecked(checkboxName)
{
    return $('input[name*="' + checkboxName + '"]:checked').length;
}

function countDataTableRows(datatable)
{
    return datatable.data().count();
}

function deleteButton(records)
{
    return $('#delete'+records);
}

function deleteUrl(records, record = null)
{
    return record ? records.toLowerCase() + '/' + record : records.toLowerCase();
}

function deleteMany(records)
{
    return '#delete'+records;
}

function deleteSingle(records)
{
    return '#delete'+pluralize.singular(records);
}

function getLocation(records, location='#card')
{
    return location+records;
}
