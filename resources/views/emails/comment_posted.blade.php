@component('mail::message')

Dear {{ ucfirst($article->user->profile->first_name) }},

{{ $comment->user->name }} has left a comment on your article:

{{ $article->title }}

@component('mail::button', ['url' => route('articles.show', $article)])
View Comment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
