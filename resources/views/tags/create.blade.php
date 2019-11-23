@extends('layouts.admin')

@section('title', 'Admin | Create Tag')

@section('content')
    @header(['title' => 'Create tag'])
        @viewAll (['records' => 'tags', 'route' => route('admin.tags.index')])
        @endviewAll
    @endheader

    <div class="w-3/5 mx-auto">
        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.tags._form_save', [
                    'route' => route('admin.tags.store'),
                    'button_title' =>'Create tag',
                ])
            </div>
        </div>
    </div>
@endsection
