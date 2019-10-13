@extends('layouts.app')

@section('content')

    @include('partials.articles._single', [
        'article' => $article
    ])

@endsection
