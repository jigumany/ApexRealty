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
                        <li class="breadcrumb-item"><a href="{{ url('admin/leads') }}">Tasks</a></li>
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
                    <div class="form-container bg-white p-4 rounded-sm mb-3">
                        <form action="{{ route('tasks.store', $lead->id) }}" method="POST" class="tasks-form">
                            @csrf
                            <div class="inner-form grid grid-cols-6 gap-2 gap-y-0 grid-flow-row">
                                {{-- Name and Priority --}}
                                <input placeholder="Task Name" class="lg:col-span-3 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" id="name">
                                <input placeholder="Priority" class="lg:col-span-3 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="priority" id="priority">
                                
                                {{-- Date End and Start --}}
                                <input type="date" class="form-input md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" name="start_date" id="startDate">
                                <input type="date" class="form-input md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" name="end_date" id="startDate">
                                
                                
                                {{-- Status --}}
                                <select class="form-select lg:col-span-3 md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Status" name="status" id="status">
                                    <option placeholder="Assign Status" value="Assign Status" class="text-gray-700">Assign Status</option>
                                    @foreach ($status as $s)
                                        <option placeholder="{{ $s->name }}" value="{{ $s->id }}" class="text-gray-700">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-select lg:col-span-3 md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="task Type" name="type_id" id="task_type">
                                    <option placeholder="Assign Status" value="Assign Status" class="text-gray-700">Assign Type</option>
                                    @foreach ($type as $s)
                                        <option placeholder="{{ $s->name }}" value="{{ $s->id }}" class="text-gray-700">{{ $s->name }}</option>
                                    @endforeach
                                </select>

                                {{-- Description of Task --}}
                                <textarea name="description" placeholder="Description of Task" id="description" cols="30" rows="3" class="lg:col-span-6 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>
                            <input class="py-2 px-3 transition duration-500 text-white hover:text-black bg-green-400 rounded-sm shadow-sm" type="submit" value="Create Task">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
  