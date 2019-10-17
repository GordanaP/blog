@extends('layouts.auth')

@section('title', 'Home')

@section('links')
    <style>
        .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
        .card {min-height: 350px;}
    </style>
@endsection

@section('content')
    <div class="w-4/5 mx-auto">
        <header>
            <h1>Home Page</h1>
            <hr class="mb-4">
        </header>

        <div class="row">
            <div class="col-md-4">
            <div class="card box-shadow">
                <div class="card-header">
                    <h4 class="font-normal text-center">My account</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">
                        Edit account
                    </button>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="font-normal text-center">My profile</h4>
                </div>
                <div class="card-body flex flex-col justify-center">
                    <div class="mt-3 mb-2 mx-auto">
                        <img src="{{ optional(Auth::user()->profile)->avatar
                        ? ProfileImageService::getUrl(Auth::user()->profile->avatar)
                        : asset('images/profile_default.png') }}" width="150" class="rounded-full">

                        @if (Auth::user()->hasProfile())
                            @include('partials.profiles._form_delete', [
                                'profile' => Auth::user()->profile
                            ])
                        @endif
                    </div>
                    <div>
                        <a href="{{ Auth::user()->hasProfile() ? route('profiles.edit', Auth::user()->profile) : route('users.profiles.create', Auth::user()) }}"
                        class="btn btn-lg btn-block btn-outline-primary">
                            {{ Auth::user()
                                ->hasProfile() ? 'Edit' : 'Create' }} profile
                        </a>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="font-normal text-center">My articles</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>
                            <a href="">
                                All articles
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Published
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Approved for publishing
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Pending
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Expired
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Draft
                            </a>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">
                        Create new
                    </button>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
