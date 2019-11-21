@extends('layouts.admin')

@section('title', 'Admin | Categories')

@section('page_title')
    @pageTitle(['title' => 'All categories'])
        @addNew (['route' => route('admin.categories.create')])
        @endaddNew
    @endpageTitle
@endsection

@section('content')
    @include('alerts._error_ajax')

    @dataTable(['records' => 'Categories'])
        <th>Id</th>
        <th>Name</th>
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