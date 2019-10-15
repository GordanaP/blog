@extends('layouts.auth')

@section('content')
    <header>
        <h3>Create new article</h3>
        <hr>
    </header>

    <main>
        @include('partials.articles._form_save', [
            'route' => route('users.articles.store', $user),
            'button_title' => 'Submit',
        ])
    </main>
@endsection
