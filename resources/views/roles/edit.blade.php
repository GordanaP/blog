@extends('layouts.admin')

@section('title', 'Admin | Edit Role')

@section('content')
    @header(['title' => 'Edit role'])
        @viewAll(['records' => 'roles', 'route' => route('admin.roles.index')])
        @endviewAll
    @endheader

    <div class="w-3/5 mx-auto">
        <div class="float-right mb-2">
            @delete(['route' => route('admin.roles.destroy', $role)])
            @enddelete

            @view(['route' => route('admin.roles.show', $role)])
            @endview
        </div>

        <div class="clearfix"></div>

        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.roles._form_save', [
                    'role' => $role,
                    'route' => route('admin.roles.update', $role),
                    'button_title' =>'Save changes',
                ])
            </div>
        </div>
    </div>
@endsection