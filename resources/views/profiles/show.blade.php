@extends('layouts.auth')

@section('title', $profile->full_name)

@section('content')
    <div class="w-4/5 mx-auto">
        <header>
            <div class="flex justify-between">
                <h3>{{ $profile->full_name }}</h3>
                <div>
                    <a href="{{ route('profiles.edit', $profile) }}"
                    class="btn btn-link btn-sm btn-warning text-gray-900">
                        <i class="fa fa-sm fa-pencil" aria-hidden="true"></i>
                    </a>
                    @include('partials.profiles._form_delete', [
                        'profile' => $profile
                    ])
                </div>
            </div>
            <hr>
        </header>

        <main>
            <div class="row">
                <div class="col-md-6">
                    @include('partials.profiles._show', [
                        'profile' => $profile
                    ])
                </div>

                <div class="col-md-6">
                    <div class="bg-white p-3">
                        @foreach ($profile->user->articles as $article)
                            @include('partials.articles._info', [
                                'article' => $article
                            ])
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
