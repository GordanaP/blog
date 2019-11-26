@extends('layouts.admin')

@section('title', 'Admin | Show Category')

@section('content')
    @include('alerts._error_ajax')

    @header(['title' => $category->name])
        @addNewLink(['record' => 'category', 'route' => route('admin.categories.create')])
        @endaddNewLink

        @viewAll(['records' => 'categories', 'route' => route('admin.categories.index')])
        @endviewAll
    @endheader

    <div class="float-left mb-2">
        @delete(['route' => route('admin.categories.destroy', $category)])
        @enddelete

        @edit(['route' => route('admin.categories.edit', $category)])
        @endedit
    </div>

    <div class="clearfix"></div>

    <div class="card card-body bg-gray-100 p-1 text-sm mt-2 mb-10">
        @include('partials.categories._show_category', [
            'category' => $category
        ])
    </div>

    <div id="cardArticles">
        @header(['title' => $category->name .' articles',
        'records_count' => $category->articles->count()])
            @addNew (['record' => 'article',
                'route' => route('admin.categories.articles.create', $category)])
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
        var parentId = "{{ $category->slug }}";
        var parentRecords = 'categories';

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
