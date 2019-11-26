@extends('layouts.admin')

@section('title', 'Admin | Show Profile')

@section('content')
    @header(['title' => $profile->full_name])
        @addNewLink(['record' => 'profile', 'route' => route('admin.profiles.create')])
        @endaddNewLink

        @viewAll(['records' => 'profiles', 'route' => route('admin.profiles.index')])
        @endviewAll
    @endheader

    <div class="float-left mb-2">
        @delete(['route' => route('admin.profiles.destroy', $profile)])
        @enddelete

        @edit(['route' => route('admin.profiles.edit', $profile)])
        @endedit
    </div>

    <div class="clearfix"></div>

    <div class="card card-body bg-gray-100 p-1 text-sm mb-10">
        @include('partials.profiles.admin._show_details', [
            'profile' => $profile
        ])
    </div>

    @if ($profile->user->hasArticles())
        <div id="cardArticles">
            @header(['title' => $profile->full_name .' articles',
            'records_count' => $profile->user->articles->count()])
                @addNew (['record' => 'article', 'route' => route('admin.users.articles.create', $profile->user)])
                @endaddNew
            @endheader
        </div>

        @dataTable(['records' => 'Articles'])
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th class="w-1/5"></th>
        @enddataTable
    @endif
@endsection

@section('scripts')
    <script>

        var records = 'Articles';
        var parentId = "{{ $profile->user->id }}";
        var parentRecords = 'users';

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
