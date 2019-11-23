@extends('layouts.admin')

@section('title', 'Admin | Show Role')

@section('content')
    @include('alerts._error_ajax')

    @header(['title' => $role->name])
        @viewAll(['records' => 'roles', 'route' => route('admin.roles.index')])
        @endviewAll
    @endheader

    <div>
        <div class="float-right">
            @delete(['route' => route('admin.roles.destroy', $role)])
            @enddelete

            @edit(['route' => route('admin.roles.edit', $role)])
            @endedit
        </div>

        <div class="clearfix"></div>

        <div class="card card-body bg-gray-100 p-1 text-sm mt-2 mb-10">
            @include('partials.roles._show_role', [
                'role' => $role
            ])
        </div>
    </div>

    <div id="cardUsers">
        @header(['title' => $role->name . " accounts", 'records_count' => $role->users_count])
            @addNew (['record' => 'account', 'route' => route('admin.roles.users.create', $role)])
            @endaddNew
        @endheader
    </div>

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
        var parentId = "{{ $role->slug }}";
        var parentRecords = 'roles';

        @include('partials.users._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
