@extends('layouts.admin')

@section('title', 'Admin | Show User')

@section('content')
    @include('alerts._error_ajax')

    @header(['title' => $user->name])
        @viewAll(['records' => 'users', 'route' => route('admin.users.index')])
        @endviewAll
    @endheader

    <div class="float-right mb-2">
        @delete(['route' => route('admin.users.destroy', $user)])
        @enddelete

        @edit(['route' => route('admin.users.edit', $user)])
        @endedit
    </div>

    <div class="clearfix"></div>

    <div class="card card-body bg-gray-100 p-1 text-sm mt-2 mb-10">
        @include('partials.users._show_user', [
            'user' => $user
        ])
    </div>

    @if ($user->hasArticles())
        <div id="cardArticles">
            @header(['title' => $user->profile->full_name ?? $user->name .' articles',
            'records_count' => $user->articles->count()])
                @addNew (['record' => 'article', 'route' => route('admin.users.articles.create', $user)])
                @endaddNew
            @endheader
        </div>

        @dataTable(['records' => 'Articles'])
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th class="w-1/5"></th>
        @enddataTable
    @endif
@endsection

@section('scripts')
    <script>

        var records = 'Articles';
        var parentId = "{{ $user->id }}";
        var parentRecords = 'users';

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
