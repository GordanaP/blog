@extends('layouts.admin')

@section('title', 'Admin | Show Article')

@section('content')
    @header(['title' => $article->title])
        @addNewLink(['record' => 'article', 'route' => route('admin.articles.create')])
        @endaddNewLink

        @viewAll(['records' => 'articles', 'route' => route('admin.articles.index')])
        @endviewAll
    @endheader

    <div class="float-left mb-2">
        @delete(['route' => route('admin.articles.destroy', $article)])
        @enddelete

        @edit(['route' => route('admin.articles.edit', $article)])
        @endedit
    </div>

    <div class="clearfix"></div>

    <div class="card card-body bg-gray-100 p-1 text-sm mb-10">
        @include('partials.articles._show_article', [
            'article' => $article
        ])
    </div>
@endsection
