@extends('layouts.admin')

@section('title', 'Admin | Profiles')

@section('content')
    @include('alerts._error_ajax')

    <div id="cardProfiles">
        @header(['title' => ' All profiles', 'records_count' => $profiles_count])
            @addNew (['record' => 'profile', 'route' => route('admin.profiles.create')])
            @endaddNew
        @endheader
    </div>

    @dataTable(['records' => 'Profiles'])
        <th>Id</th>
        <th>Name</th>
        <th>Account</th>
        <th>Articles</th>
        <th class="w-1/5"></th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Profiles';
        var parentId = null;
        var parentRecords = null;

        @include('partials.profiles.admin._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection