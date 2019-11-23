@extends('layouts.admin')

@section('title', 'Admin | Edit User')

@section('content')
    @header(['title' => 'Edit user'])
        @viewAll(['records' => 'users', 'route' => route('admin.users.index')])
        @endviewAll
    @endheader

    <div class="w-3/5 mx-auto">
        <div class="float-right mb-2">
            @delete(['route' => route('admin.users.destroy', $user)])
            @enddelete

            @view(['route' => route('admin.users.show', $user)])
            @endview
        </div>

        <div class="clearfix"></div>

        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.users._form_save', [
                    'user' => $user,
                    'route' => route('admin.users.update', $user),
                    'button_title' =>'Save changes',
                ])
            </div>
        </div>
    </div>
@endsection