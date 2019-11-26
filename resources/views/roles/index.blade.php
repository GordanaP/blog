@extends('layouts.admin')

@section('title', 'Admin | Roles')

@section('content')
    @include('alerts._error_ajax')

    <div id="cardRoles">
        @header(['title' => 'All roles', 'records_count' => $roles_count ])
            @addNew (['record' => 'role', 'route' => route('admin.roles.create') ])
            @endaddNew
        @endheader
    </div>

    @dataTable(['records' => 'Roles'])
        <th>Id</th>
        <th>Name</th>
        <th>Users</th>
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