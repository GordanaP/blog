@extends('layouts.admin')

@section('title', 'Admin | All Users')

@section('page_title', 'All Users')

@section('content')

        @include('alerts._error_ajax')

        @dataTable(['records' => 'Users', 'collection' => $users])
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th class="w-1/5"></th>
        @enddataTable
    </div>
@endsection

@section('scripts')
    <script>

        var records = 'Users';

        @include('partials.users._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection