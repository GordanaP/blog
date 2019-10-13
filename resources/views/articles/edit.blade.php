@extends('layouts.auth')

@section('content')

    <header>
        <h3>Edit article</h3>
        <hr>
    </header>

    <main>
        @include('partials.articles._form_save', [
            'route' => route('articles.update', $article),
            'article' => $article,
            'button_title' => 'Save changes',
        ])
    </main>

@endsection
