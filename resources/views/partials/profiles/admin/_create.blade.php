@extends('layouts.admin')

@section('title', 'Admin | Create Profile')

@section('content')
    @header(['title' => 'Create profile'])
        @viewAll (['records' => 'profiles', 'route' => route('admin.profiles.index')])
        @endviewAll
    @endheader

    <div class="w-3/5 mx-auto">
        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.profiles._form_save', [
                    'route' => route('admin.profiles.store'),
                    'button_title' =>'Create profile',
                ])
            </div>
        </div>
    </div>
@endsection
