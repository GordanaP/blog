@extends('layouts.admin')

@section('title', 'Admin | Edit Article')

@section('page_title', 'Edit Article')

@section('content')
    <div class="w-3/5 mx-auto">
        <main>
            @include('partials.articles._form_save', [
                'route' => route('articles.update', $article),
                'article' => $article,
                'button_title' => 'Save changes',
            ])
        </main>
    </div>
@endsection
