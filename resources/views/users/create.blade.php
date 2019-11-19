@extends('layouts.admin')

@section('title', 'Admin | Create User')

@section('page_title')
    @pageTitle(['title' => 'Create user'])
        @viewAll (['records' => 'users','route' => route('admin.users.index')])
        @endviewAll
    @endpageTitle
@endsection

@section('content')
    <div class="w-3/5 mx-auto">
        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.users._form_save', [
                    'route' => route('admin.users.store'),
                    'button_title' =>'Create user',
                ])
            </div>
        </div>
    </div>
@endsection
