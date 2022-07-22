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
                    @if($current_user->is_super_admin === 1 || $current_user->is_admin === 1)
                    <div class="search-and-create lg:flex justify-between align-items-center mb-3">
                        <div class="create-user">
                            <a class="bg-slate-900 hover:bg-slate-700 text-white transition duration-500 flex justify-center align-items-center py-2 rounded-md shadow-sm w-[175px]" href="{{ route('leads.create') }}">Create New Lead</a>
                        </div>
                        <x-search-field placeholder='Search Leads..' />
                    </div>
                    @endif
                    <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-4">
                        @foreach ($leads as $lead)
                            <x-lead-card :lead="$lead" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
  