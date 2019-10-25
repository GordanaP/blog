@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <!-- Authorized views -->
    @can('update', $article)
    <div class="mb-3">
        @include('partials.articles._action_buttons', [
            'article' => $article
        ])

        @include('partials.articles._status_info', [
            'article' => $article
        ])
    </div>
    @endcan


    <!-- Article -->
    @include('partials.articles._single', [
        'article' => $article
    ])

    <!-- Login prompt for an unauthenticated user -->
    @guest
        @include('partials.comments._login_prompt')
    @endguest

    <!-- Comment form -->
    @auth
        @include('partials.comments._form_save', [
            'user' => Auth::user(),
            'article' => $article,
        ])
    @endauth

    <!-- Comments list -->
    <p class="text-lg font-bold">Comments: {{ $article->comments->count() }}</p>

    <div href="#commentsList">
        @forelse ($article->latest_comments as $comment)
            @comment(['comment' => $comment])
            @endcomment
        @empty
            <p>There are no comments at present.</p>
        @endforelse
    </div>

@endsection
