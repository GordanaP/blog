@extends('layouts.auth')

@section('title', 'Create profile')

@section('content')
    <div class="w-3/5 mx-auto">
        <header>
            <h3>Create a profile</h3>
            <hr>
        </header>

        <main>
            @include('partials.profiles._form_save', [
                'route' => route('users.profiles.store', $user),
                'button_title' => 'Create profile'
            ])
        </main>
    </div>
@endsection
