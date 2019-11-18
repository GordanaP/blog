@extends('layouts.admin')

@section('title', 'Admin | Show User')

@section('page_title', 'Show user')

@section('content')

    <div class="row mt-10">
        <div class="col-md-8 offset-md-2">
            @include('partials.users._show_user', [
                'user' => $user
            ])
        </div>
    </div>

@endsection
