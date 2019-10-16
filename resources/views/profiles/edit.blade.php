@extends('layouts.auth')

@section('title', 'Edit profile')

@section('content')
    <div class="w-3/5 mx-auto">
        <header>
            <h3>Edit the profile</h3>
            <hr>
        </header>

        <main>
            @include('partials.profiles._form_save', [
                'route' => route('profiles.update', $profile),
                'button_title' => 'Save changes'
            ])
        </main>
    </div>
@endsection
