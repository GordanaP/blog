@extends('layouts.admin')

@section('title', 'Admin | Edit Tag')

@section('content')
    @header(['title' => 'Edit tag'])
        @viewAll(['records' => 'tags', 'route' => route('admin.tags.index')])
        @endviewAll
    @endheader

    <div class="w-3/5 mx-auto">
        <div class="float-right mb-2">
            @delete(['route' => route('admin.tags.destroy', $tag)])
            @enddelete

            @view(['route' => route('admin.tags.show', $tag)])
            @endview
        </div>

        <div class="clearfix"></div>

        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.tags._form_save', [
                    'tag' => $tag,
                    'route' => route('admin.tags.update', $tag),
                    'button_title' =>'Save changes',
                ])
            </div>
        </div>
    </div>
@endsection