@extends('layouts.admin')

@section('title', 'Admin | Show Article')

@section('content')
    @header(['title' => $article->title])
        @viewAll(['records' => 'articles', 'route' => route('admin.articles.index')])
        @endviewAll
    @endheader

    <div class="float-right mb-2">
        @delete(['route' => route('admin.articles.destroy', $article)])
        @enddelete

        @edit(['route' => route('admin.articles.edit', $article)])
        @endedit
    </div>

    <div class="clearfix"></div>

    <div class="card card-body bg-gray-100 p-1 text-sm">
        @include('partials.articles._show_article', [
            'article' => $article
        ])
    </div>
@endsection
