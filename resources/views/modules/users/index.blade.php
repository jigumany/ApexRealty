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
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="create-user">
                        @if($current_user->is_super_admin === 1 || $current_user->is_admin === 1)
                            <a class="bg-slate-900 hover:bg-slate-700 text-white transition duration-500 flex justify-center align-items-center p-3 rounded-md shadow-sm mb-3 w-[175px]" href="{{ route('user.create') }}">Create User</a>
                        @endif
                    </div>
                    <x-alert/>
                    <div class="users grid gap-4 lg:grid-cols-3 lg:grid-rows-3 md:grid-cols-2 mb-5">
                        @foreach ($users as $user)
                        <div
                            class="grid-card bg-white flex flex-col rounded-sm shadow-sm border-collapse position-relative">
                            <div class="grid-card__user-details p-2">
                                <div class="user-details flex mb-2">
                                    <img class="avatar shadow-sm mr-2" src="{{ $user->image ? $user->image : "
                                        https://avatars.dicebear.com/api/adventurer/{$user->name}.svg" }}"
                                    alt="avatar-image">
                                    <div class="user-details__inner">
                                        <p>{{ $user->roles()->orderBy('name')->first()->name }}</p>
                                        <h3>{{ $user->name }}</h3>
                                    </div>
                                </div>
                                <p><span class="font-bold">Position:</span> {{ $user->position_title }}</p>
                                <p><span class="font-bold">Phone:</span> {{ $user->phone }}</p>
                            </div>
                            <div class="grid-card__user-actions flex flex-row w-100 ">
                                <a class="flex-1 p-3 text-center justify-center align-items-center border-2 border-gray-100 border-r-0"
                                    href="{{ 'show-profile' }}">View Profile</a>
                                <a class="flex-1 p-3 text-center justify-center align-items-center border-2 border-gray-100"
                                    href="{{ route('user.edit', $user->id) }}">Edit Profile</a>
                            </div>
                            @if($current_user->is_super_admin === 1 || $current_user->is_admin === 1)
                            <div class="grid-card__admin-actions position-absolute top-2 right-5">
                                <button type="button"
                                    class="inline-flex justify-center w-full text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    Options
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="actions-menu origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a href="#" record="user" person="{{ $user->name }}" record-id="{{ $user->id }}" class="delete text-red-500 block px-4 py-2 text-sm transition duration-300 hover:text-red-700" role="menuitem" tabindex="-1" id="menu-item-0">Delete</a>
                                        <a href="#suspend" class="suspend text-yellow-500 block px-4 py-2 text-sm transition duration-300 hover:text-yellow-700" role="menuitem" tabindex="-1" id="menu-item-1">Suspend Account</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
  