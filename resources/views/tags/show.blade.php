@extends('layouts.admin')

@section('title', 'Admin | Show Tag')

@section('content')
    @include('alerts._error_ajax')

    @header(['title' => $tag->name])
        @viewAll(['records' => 'tags', 'route' => route('admin.tags.index')])
        @endviewAll
    @endheader

    <div class="float-right mb-2">
        @delete(['route' => route('admin.tags.destroy', $tag)])
        @enddelete

        @edit(['route' => route('admin.tags.edit', $tag)])
        @endedit
    </div>

    <div class="clearfix"></div>

    <div class="card card-body bg-gray-100 p-1 text-sm mt-2 mb-10">
        @include('partials.tags._show_tag', [
            'tag' => $tag
        ])
    </div>

    <div id="cardArticles">
        @header(['title' => $tag->name .' articles',
        'records_count' => $tag->articles->count()])
            @addNew (['record' => 'article', 'route' => route('admin.tags.articles.create', $tag)])
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
@endsection

@section('scripts')
    <script>

        var records = 'Articles';
        var parentId = "{{ $tag->slug }}";
        var parentRecords = 'tags';

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
