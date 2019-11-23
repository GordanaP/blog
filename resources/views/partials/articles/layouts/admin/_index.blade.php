@extends('layouts.admin')

@section('title', 'Admin | Articles')

@section('content')
    @include('alerts._error_ajax')

    <div id="cardArticles">
        @header(['title' => ' All articles', 'records_count' => $articles_count])
            @addNew (['record' => 'article', 'route' => route('admin.articles.create')])
            @endaddNew
        @endheader
    </div>

    @dataTable(['records' => 'Articles'])
        <th>Id</th>
        <th width="40%">Title</th>
        <th>Author</th>
        <th>Status</th>
        <th class="w-1/5"></th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Articles';
        var parentId = null;
        var parentRecords = null;

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection