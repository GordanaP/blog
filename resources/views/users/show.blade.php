@extends('layouts.admin')

@section('title', 'Admin | Show User')

@section('page_title')
    @pageTitle(['title' => '@'.$user->name])
        @viewAll(['records' => 'users','route' => route('admin.users.index')])
        @endviewAll
    @endpageTitle
@endsection

@section('content')
    <div class="w-3/5 mx-auto">
        <div class="float-right mb-2">
            @delete(['route' => route('admin.users.destroy', $user)])
            @enddelete

            @edit(['route' => route('admin.users.edit', $user)])
            @endedit
        </div>

        <div class="clearfix"></div>

        <div class="card card-body bg-gray-100 p-1 text-sm">
            @include('partials.users._show_user', [
                'user' => $user
            ])
        </div>
    </div>
@endsection
