@extends('layouts.admin')

@section('title', 'Admin | Tags')

@section('content')
    @include('alerts._error_ajax')

    <div id="cardTags">
        @header(['title' => 'All Tags', 'records_count' => $tags_count ])
            @addNew (['record' => 'tag', 'route' => route('admin.tags.create') ])
            @endaddNew
        @endheader
    </div>

    @dataTable(['records' => 'Tags'])
        <th>Id</th>
        <th>Name</th>
        <th>Articles</th>
        <th class="w-1/5"></th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Tags';

        @include('partials.tags._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection