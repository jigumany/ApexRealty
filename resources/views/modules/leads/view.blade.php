@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }} - {{ $lead->getName() }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/leads') }}">Leads</a></li>
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
                    <div class="actions mb-2">
                        <a href="{{ route('leads.edit', $lead->id) }}" class="ap-btn">Update</a>
                        <a href="#" class="ap-btn delete" record="leads" person="{{ $lead->getName() }}" record-id="{{ $lead->id }}">Delete</a>
                        {{-- TODO SETUP IF Assign isn't assigned. --}}
                        <a href="{{ route('leads.edit', $lead->id) }}" class="ap-btn assign">Assign</a>
                        @if($current_user->is_admin === 1 || $current_user->is_super_admin === 1)
                            <a href="#" class="ap-btn assign">Create Task</a>
                        @endif
                    </div>
                    <div class="default-layout">
                        <div class="lead-info shadow-sm round-sm p-2 bg-white xl:col-span-3 col-span-6">
                            <h4 class="text-lg mb-3">Lead:</h4>
                            <div class="lead-details">
                                <div class="lead-detail">
                                    <strong>Full name:</strong> {{ $lead->getName() }}
                                </div>
                                <div class="lead-detail">
                                    <strong>Position:</strong> {{ $lead->position_title }}
                                </div>
                                <div class="lead-detail">
                                    <strong>Referred from:</strong> {{ $lead->referral_source }}
                                </div>
                                <div class="lead-detail">
                                    <strong>Company:</strong> {{ $lead->company }}
                                </div>
                                <div class="lead-detail">
                                    <strong>Budget:</strong> R{{ $lead->budget }}
                                </div>
                                <div class="lead-detail">
                                    <strong>Project:</strong> {{ $lead->project_type }}
                                </div>
                                <div class="lead-detail">
                                    <strong>Project Details:</strong>
                                    <p>{{ $lead->project_description }}</p>
                                </div>
                                <div class="lead-detail">
                                    <strong>General Details:</strong>
                                    <p>{{ $lead->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="task-info shadow-sm round-sm p-2 bg-white xl:col-span-3 col-span-6">
                            @if($tasks ?? '')
                                <h4 class="text-lg mb-3">Tasks</h4>
                            @else
                                <p>No tasks for this lead at the moment.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
  