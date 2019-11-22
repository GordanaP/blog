@extends('layouts.admin')

@section('title', 'Admin | Show Role')

@section('page_title')
    @pageTitle(['title' => $role->name])
        @viewAll(['records' => 'roles', 'route' => route('admin.roles.index')])
        @endviewAll
    @endpageTitle
@endsection

@section('content')

    @include('alerts._error_ajax')

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

    @pageTitle(['title' => $role->name . "'s users"])
        @addNew (['route' => route('admin.roles.users.create', $role)])
        @endaddNew
    @endpageTitle

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
        var parentId = "{{ optional($role)->slug }}";
        var parentRecords = parentId ? 'roles' : '';

        @include('partials.users._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
