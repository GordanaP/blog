@extends('layouts.app')

@section('title', 'All Articles')

@section('content')
    @forelse($articles as $article)

        <!-- Authorized actions-->
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
    @empty
        <p>There are no articles at present.</p>
    @endforelse

    <div class="mx-auto">
        {{ $articles->appends(Request::query())->links() }}
    </div>
@endsection

@section('sidebar')
    @include('partials.app._side')
@endsection