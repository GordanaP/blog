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

        @include('partials.datatables._delete_records')

    </script>
@endsection