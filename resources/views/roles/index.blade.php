@extends('layouts.admin')

@section('title', 'Admin | Roles')

@section('page_title')
    @pageTitle(['title' => 'All roles'])
        @addNew (['route' => route('admin.roles.create')])
        @endaddNew
    @endpageTitle
@endsection

@section('content')
    @include('alerts._error_ajax')

    @dataTable(['records' => 'Roles'])
        <th>Id</th>
        <th>Name</th>
        <th class="w-1/5"></th>
    @enddataTable
@endsection

@section('scripts')
    <script>
        var records = 'Roles';

        @include('partials.roles._datatable')

        @include('partials.datatables._delete_records')
    </script>
@endsection