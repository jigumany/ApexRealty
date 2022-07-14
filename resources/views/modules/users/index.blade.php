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
                            <x-user-card :current-user="$current_user" :user="$user" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
  