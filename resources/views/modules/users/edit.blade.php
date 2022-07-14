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
                    <div class="card">
                        <div class="card-header">
                            <div class="w-full">
                                <form action="{{ route('user.store', $user->id) }}" method="POST" class="user-form">
                                    @csrf
                                    <input value="{{ $user->name }}" placeholder="Name" class="mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" id="name">
                                    <input value="{{ $user->email }}" placeholder="Email" class="mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" id="email">
                                    <input value="{{ $user->position_title }}" placeholder="Position" class="mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="position_title" id="position_title">
                                    <input value="{{ $user->phone }}" placeholder="Phone" class="mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="phone" id="phone">
                                    <select class="w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Assign Role" name="role_id" id="roles">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user_role->name == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <input class="py-2 px-3 transition duration-500 text-white hover:text-black bg-green-400 rounded-sm shadow-sm" type="submit" value="Update User">
                                    @error($errors->all())
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    @enderror
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection