@extends('layouts.admin')

@section('title', 'Admin | Edit User')

@section('page_title', 'Edit user')

@section('content')

    <div class="row mt-10">
        <div class="col-md-8 offset-md-2">
            <div class="card card-body px-12 bg-gray-100">
                @include('partials.users._form_save', [
                    'user' =>$user,
                    'route' => route('users.update', $user),
                    'button_title' =>'Save changes',
                ])
            </div>
        </div>
    </div>

@endsection