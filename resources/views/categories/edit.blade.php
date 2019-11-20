@extends('layouts.admin')

@section('title', 'Admin | Edit Category')

@section('page_title')
    @pageTitle(['title' => 'Edit category'])
        @viewAll(['records' => 'categories','route' => route('admin.categories.index')])
        @endviewAll
    @endpageTitle
@endsection

@section('content')
    <div class="w-3/5 mx-auto">
        <div class="float-right mb-2">
            @delete(['route' => route('admin.categories.destroy', $category)])
            @enddelete

            @view(['route' => route('admin.categories.show', $category)])
            @endview
        </div>

        <div class="clearfix"></div>

        <div class="card card-body bg-gray-100 p-1 text-sm">
            <div class="card card-body">
                @include('partials.categories._form_save', [
                    'category' => $category,
                    'route' => route('admin.categories.update', $category),
                    'button_title' =>'Save changes',
                ])
            </div>
        </div>
    </div>
@endsection