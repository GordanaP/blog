@extends('layouts.admin')

@section('title', 'Admin | Show Category')

@section('page_title')
    @pageTitle(['title' => $category->name])
        @viewAll(['records' => 'categories', 'route' => route('admin.categories.index')])
        @endviewAll
    @endpageTitle
@endsection

@section('content')

    @include('alerts._error_ajax')

    <div>
        <div class="float-right">
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
    </div>

    @pageTitle(['title' => $category->name . "'s articles",
                'recordsCount' => '('.$category->articles->count().')'
        ])
        @addNew (['route' => route('admin.categories.articles.create', $category)])
        @endaddNew
    @endpageTitle

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
        var parentId = "{{ optional($category)->slug }}"
        var parentRecords = parentId ? 'categories' : '';

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
