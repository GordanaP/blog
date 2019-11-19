@extends('layouts.auth')

@section('title', 'Create Article')

@section('content')
    <div class="w-3/5 mx-auto">
        <header>
            <h3>Create new article</h3>
            <hr>
        </header>

        <div class="card card-body">
            @include('partials.articles._form_save', [
                'route' => route('users.articles.store', $user),
                'button_title' => 'Submit',
            ])
        </div>
    </div>
@endsection
