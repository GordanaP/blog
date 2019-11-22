@extends('layouts.admin')

@section('title', 'Admin | Create Role')

@section('page_title')
    @pageTitle(['title' => 'Create role'])
        @viewAll (['records' => 'roles','route' => route('admin.roles.index')])
        @endviewAll
    @endpageTitle
@endsection

@section('content')
    <div class="w-3/5 mx-auto">
        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.roles._form_save', [
                    'route' => route('admin.roles.store'),
                    'button_title' =>'Create role',
                ])
            </div>
        </div>
    </div>
@endsection