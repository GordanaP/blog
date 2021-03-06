@extends('layouts.admin')

@section('title', 'Admin | Create Category')

@section('content')
    @header(['title' => 'Create category'])
        @viewAll (['records' => 'categories', 'route' => route('admin.categories.index')])
        @endviewAll
    @endheader

    <div class="w-3/5 mx-auto">
        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.categories._form_save', [
                    'route' => route('admin.categories.store'),
                    'button_title' =>'Add category',
                ])
            </div>
        </div>
    </div>
@endsection
