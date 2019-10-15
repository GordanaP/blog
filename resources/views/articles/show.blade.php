@extends('layouts.app')

@section('content')

    <!-- Article -->
    @include('partials.articles._single', [
        'article' => $article
    ])

    <!-- Login prompt -->
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

    @forelse ($article->latest_comments as $comment)
        @comment(['comment' => $comment])
        @endcomment
    @empty
        <p>There are no comments at present.</p>
    @endforelse

@endsection
