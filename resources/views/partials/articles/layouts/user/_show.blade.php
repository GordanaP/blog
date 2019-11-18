@extends('layouts.app')

@section('title', $article->title)

@section('content')

    @can('touchAsAuthor', $article)
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

    <!-- Prompt login for an unauthenticated user -->
    @guest
        @include('partials.comments._login_prompt')
    @endguest

    <!-- Comment form -->
    @auth
        @include('partials.comments._form_store', [
            'user' => Auth::user(),
            'article' => $article,
        ])
    @endauth

    <!-- Comments list -->
    <div id="commentsList">
        <p class="text-lg font-bold">Comments: {{ $article->comments_count }}</p>

        <div href="#commentsList">
            @forelse ($article->latest_comments as $comment)
                @comment(['comment' => $comment, 'user' => Auth::user()])
                @endcomment
            @empty
                <p>There are no comments at present.</p>
            @endforelse
        </div>
    </div>

    @include('partials.comments._modal_edit')

@endsection

@section('sidebar')
    @include('partials.app._side')
@endsection

@section('scripts')
    <script>

        var loginUrl = "{{ route('login') }}";
        var commentModal = $('#commentModal');
        var commentBody = $('#commentBody');
        var commentSaveButton = $('#commentSaveButton');
        var errorFields = ['body'];

        commentModal.setAutofocus('#commentBody');
        commentModal.clearOnClose(errorFields);
        clearErrorOnNewInput()

        // Edit comment
        @include('partials.comments._js_edit')

        // Update comment
        @include('partials.comments._js_update')

        // Delete comment
        @include('partials.comments._js_delete')

    </script>
@endsection
