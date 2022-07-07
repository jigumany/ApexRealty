@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (session()->has('user.updated.success'))
                        <div class="w-full p-4 text-m text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 shadow-sm" role="alert">
                            <span class="font-medium">{!! session('user.updated.success') !!}</span>
                        </div>
                    @elseif(session('status-created'))
                        <div class="w-full p-4 text-m text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 shadow-sm" role="alert">
                            <span class="font-medium">{!! session('status-created') !!}</span>
                        </div>
                    @elseif(session('status-deleted'))
                        <div class="w-full p-4 text-m text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 shadow-sm" role="alert">
                            <span class="font-medium">{!! session('status-deleted') !!}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="flex justify-center w-[250px] text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 transition duration-500" href="{{ route('user.create') }}">Create User</a>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th class="px-6 py-3">ID</th>
                                            <th class="px-6 py-3">Name</th>
                                            <th class="px-6 py-3">Email</th>
                                            <th class="px-6 py-3">Position</th>
                                            <th class="px-6 py-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="px-6 py-3 font-medium text-black whitespace-nowrap">{{ $user->id }}</td>
                                                <td class="px-6 py-3">{{ $user->name }}</td>
                                                <td class="px-6 py-3">{{ $user->email }}</td>
                                                <td class="px-6 py-3">{{ $user->position_title }}</td>
                                                <td class="px-6 py-3">
                                                    <a class="mr-3 transition duration-500" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                                    <a class="text-red-500 hover:text-red-300 transition duration-500" href="{{ route('user.delete', $user->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection