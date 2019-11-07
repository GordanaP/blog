@extends('layouts.admin')

@section('title', 'Admin | Create User')

@section('page_title', 'Create user')

@section('content')

    <div class="row mt-10">
        <div class="col-md-8 offset-md-2">
            <div class="card card-body px-12 bg-gray-100">
                @include('partials.users._form_save', [
                    'route' => route('users.store'),
                    'button_title' =>'Create user',
                ])
            </div>
        </div>
    </div>

@endsection
