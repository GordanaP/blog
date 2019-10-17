@extends('layouts.app')

@section('title', 'All Articles')

@section('content')

    @forelse($articles as $article)
        @include('partials.articles._single', [
            'article' => $article
        ])
    @empty
        <p>There are no articles at present.</p>
    @endforelse

    <div class="mx-auto">
        {{ $articles->appends(Request::query())->links() }}
    </div>
@endsection
