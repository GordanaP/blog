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

                deleteButton(records).hide();
                uncheck($(checkAll(records)));
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

                deleteButton(records).hide();
                uncheck($(checkAll(records)));
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
    return 'api/'+records.toLowerCase();
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

function getLocation(records, id='#card')
{
    return id+records;
}

function handleResponse(records, datatable)
{
    countDataTableRows(datatable) == 1 || noneChecked(records.toLowerCase())
        ? reloadLocation(getLocation(records))
        : reloadDataTable(datatable);

    deleteButton(records).hide();
    uncheck($(checkAll(records)));
}