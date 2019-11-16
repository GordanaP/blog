@extends('layouts.admin')

@section('title', 'Admin | All Articles')

@section('page_title', 'All Articles')

@section('content')

        @include('alerts._error_ajax')

        @dataTable(['records' => 'Articles', 'collection' => $all_articles])
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th class="w-1/5"></th>
        @enddataTable

@endsection


@section('scripts')
    <script>

        var records = 'Articles';

        @include('partials.articles._datatable')

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

    </script>
@endsection