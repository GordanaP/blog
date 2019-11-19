@extends('layouts.admin')

@section('title', 'Admin | Edit Article')

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

            @view(['route' => route('admin.articles.show', $article)])
            @endview
        </div>

        <div class="clearfix"></div>

        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.articles._form_save', [
                    'article' => $article,
                    'route' => route('admin.articles.update', $article),
                    'button_title' => 'Save changes',
                ])
            </div>
        </div>
    </div>
@endsection
