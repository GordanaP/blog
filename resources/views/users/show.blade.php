@extends('layouts.admin')

@section('title', 'Admin | Show User')

@section('page_title', 'Show user')

@section('content')

    <div class="row mt-10">
        <div class="col-md-8 offset-md-2">
            <div class="card card-body bg-gray-100 p-2">
                <table class="table mb-0">
                    <tbody class="bg-white border">
                        <tr>
                            <td class="font-semibold" width="30%">Username:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">
                                Email:
                            </td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Roles:</td>
                            <td>
                                @forelse ($user->roles as $role)
                                    {{ $role->name }}
                                @empty
                                    member
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Joined:</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Last update:</td>
                            <td>{{ $user->updated_at->format('d M Y') }}</td>

                        </tr>
                        @if ($user->is_author)
                            <tr>
                                <td class="font-semibold">Profile:</td>
                                <td>
                                    <a href="{{ route('profiles.show', $user->profile) }}">
                                        View profile
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Articles:</td>
                                <td>
                                    <a href="{{ route('users.articles.index', $user) }}">
                                        View articles
                                    </a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
