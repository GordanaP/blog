@extends('layouts.admin')

@section('title', 'Admin | Accounts')

@section('content')
    @include('alerts._error_ajax')

    <div id="cardUsers">
        @header(['title' => ' All users', 'records_count' => $users_count])
            @addNew (['record' => 'user', 'route' => route('admin.users.create')])
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
        var parentId = null;
        var parentRecords = null;

        @include('partials.users.admin._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection