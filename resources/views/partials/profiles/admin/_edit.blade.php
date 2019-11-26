@extends('layouts.admin')

@section('title', 'Admin | Edit Profile')

@section('content')
    @header(['title' => 'Edit profile'])
        @viewAll (['records' => 'profiles', 'route' => route('admin.profiles.index')])
        @endviewAll
    @endheader

    <div class="w-3/5 mx-auto">
        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.profiles._form_save', [
                    'route' => route('admin.profiles.update', $profile),
                    'button_title' =>'Edit profile',
                ])
            </div>
        </div>
    </div>
@endsection
