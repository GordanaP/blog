@extends('layouts.admin')

@section('title', 'Admin | All Articles')

@section('page_title')
    @pageTitle(['title' => (optional(optional($user)->profile)->full_name ?? 'All') .' articles'])
        @addNew (['route' => route('admin.articles.create')])
        @endaddNew
    @endpageTitle
@endsection

@section('content')
        @include('alerts._error_ajax')

        @dataTable(['records' => 'Articles'])
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th class="w-1/5"></th>
        @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Articles';
        var parentId = "{{ optional($user)->id }}"
        var parentRecords = parentId ? 'users' : '';

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection