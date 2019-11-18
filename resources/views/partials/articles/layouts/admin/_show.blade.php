@extends('layouts.admin')

@section('title', 'Admin | Show Article')

@section('page_title')
    @pageTitle(['title' => $article->title])
        @viewAll(['records' => 'articles','route' => route('admin.articles.index')])
        @endviewAll
    @endpageTitle
@endsection

@section('content')
    <div class="w-3/5 mx-auto">
        <div class="float-right mb-2">
            @delete(['route' => route('admin.articles.destroy', $article)])
            @enddelete

            @edit(['route' => route('admin.articles.edit', $article)])
            @endedit
        </div>

        <div class="clearfix"></div>

        <div class="card card-body bg-gray-100 p-1 text-sm">
            @include('partials.articles._table_info', [
                'article' => $article
            ])
        </div>
    </div>
@endsection
