@extends('layouts.admin')

@section('title', 'Admin | Create Article')

@section('page_title')
    @pageTitle(['title' => 'Create article'])
        @viewAll (['records' => 'articles','route' => route('admin.articles.index')])
        @endviewAll
    @endpageTitle
@endsection

@section('content')
    <div class="w-3/5 mx-auto">
        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.articles._form_save', [
                    'route' => route('admin.articles.store'),
                    'button_title' => 'Create article',
                ])
            </div>
        </div>
    </div>
@endsection

