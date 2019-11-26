@extends('layouts.admin')

@section('title', 'Admin | Categories')

@section('content')
    @include('alerts._error_ajax')

    @header(['title' => 'All categories', 'records_count' => $categories_count])
        @addNew (['record' => 'category','route' => route('admin.categories.create')])
        @endaddNew
    @endheader

    @dataTable(['records' => 'Categories'])
        <th>Id</th>
        <th>Name</th>
        <th>Articles</th>
        <th class="w-1/5"></th>
    @enddataTable
@endsection

@section('scripts')
    <script>
        var records = 'Categories';

        @include('partials.categories._datatable')

        @include('partials.datatables._delete_records')
    </script>
@endsection