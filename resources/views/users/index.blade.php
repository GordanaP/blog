@extends('layouts.admin')

@section('title', 'Admin | Users')

@section('page_title')
    @pageTitle(['title' => 'All users'])
        @addNew (['route' => route('admin.users.create')])
        @endaddNew
    @endpageTitle
@endsection

@section('content')
    @include('alerts._error_ajax')

    @dataTable(['records' => 'Users'])
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th class="w-1/5"></th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Users';
        var parentId = "{{ optional($role ?? null)->id }}"
        var parentRecords = parentId ? 'roles' : null;

        @include('partials.users._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection