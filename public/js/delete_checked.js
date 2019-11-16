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

                handleSuccessResponse(records);
            },
            error: function(response) {
                displayErrors(response.responseJSON.errors, 'div.');
                reloadDataTable(datatable);
            }
        });
    });
}

function deleteManyRecords(records, datatable)
{
    $(document).on('click', deleteMany(records), function() {

        var checkbox = records.toLowerCase();

        $.ajax({
            type: 'DELETE',
            url: deleteUrl(records),
            data: {
                ids: getCheckedValues(checkbox)
            },
            success: function(response) {
                countDataTableRows(datatable) == 1 || noneChecked(records.toLowerCase())
                    ? reloadLocation(getLocation(records))
                    : reloadDataTable(datatable);

                handleSuccessResponse(records);
            },
            error: function(response) {
                displayErrors(response.responseJSON.errors, 'div.');
                handleErrorResponse(records, datatable);
            }
        });
    });
}

function markCheckboxes(records)
{
    var singleCheckbox = '.checkitem'+records;
    var checkbox = records.toLowerCase();

    table(records).on('click', checkAll(records), function () {

        $(singleCheckbox).prop('checked', $(this).prop("checked"));
        deleteButton(records).show();

        if(isNotChecked($(this))) {
            deleteButton(records).hide();
        }
    });

    table(records).on('click', singleCheckbox, function () {

        if(isChecked($(this))) {
            deleteButton(records).show();
        }

        if(isNotChecked($(this))) {
            uncheck($(checkAll(records)))
        }

        if(allChecked(singleCheckbox)) {
            check($(checkAll(records)))
        }

        if(noneChecked(checkbox)) {
            deleteButton(records).hide();
        }
    });
}

function checkAll(records)
{
    return '#checkAll'+records;
}

function countDataTableRows(datatable)
{
    return datatable.data().count();
}

function table(records)
{
    return $('#table'+records);
}

function resourceUrl(records)
{
    return '/admin/'+records.toLowerCase() + '/list';
}

function deleteButton(records)
{
    return $('#delete'+records);
}

function deleteUrl(records, record = null)
{
    return record ? '/' + records.toLowerCase() + '/' + record
        : '/'+ records.toLowerCase();
}

function deleteMany(records)
{
    return '#delete'+records;
}

function deleteSingle(records)
{
    return '#delete'+pluralize.singular(records);
}

function getLocation(records, id='#card')
{
    return id+records;
}

function handleSuccessResponse(records)
{
    removeErrorField();
    handleResponse(records);
}

function handleErrorResponse(records, datatable)
{
    handleResponse(records);
    reloadDataTable(datatable);
}

function removeErrorField()
{
    $('div.invalid-feedback').empty().hide();
}

function handleResponse(records)
{
    deleteButton(records).hide();
    uncheck($(checkAll(records)));
}

