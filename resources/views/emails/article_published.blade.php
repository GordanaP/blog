@component('mail::message')

Dear {{ $user->name }},

{{ ucfirst($article->user->profile->full_name) }} has just published a new article:

{{ $article->title }}

@component('mail::button', ['url' => route('articles.show', $article)])
View Article
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
