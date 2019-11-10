@extends('layouts.auth')

@section('title', 'Edit account')

@section('content')
    <div class="w-3/5 mx-auto">
        <header>
            <h3>Edit account</h3>
            <hr>
        </header>

        <main>
            <div class="card card-body">
                @include('partials.users._form_save', [
                    'user' => $user,
                    'route' => route('users.update', $user),
                    'button_title' => 'Save changes'
                ])
            </div>
        </main>
    </div>
@endsection
