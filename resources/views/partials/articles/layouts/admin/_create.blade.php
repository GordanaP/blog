@extends('layouts.admin')

@section('title', 'Admin | Create Article')

@section('page_title', 'Create Article')

@section('content')
    <div class="w-3/5 mx-auto">
        <main>
            @include('partials.articles._form_save', [
                'route' => route('articles.store'),
                'button_title' => 'Submit',
            ])
        </main>
    </div>
@endsection

