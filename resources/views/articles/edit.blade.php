@extends('layouts.auth')

@section('title', 'Edit Article')

@section('content')

    <div class="w-3/5 mx-auto">
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
    </div>

@endsection
