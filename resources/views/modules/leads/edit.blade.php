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
                        <li class="breadcrumb-item"><a href="{{ url('admin/leads') }}">Leads</a></li>
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
                        <form action="{{ route('leads.store', $lead->id) }}" method="POST" class="leads-form">
                            @csrf
                            <div class="inner-form grid grid-cols-6 gap-2 gap-y-0 grid-flow-row">
                                {{-- Lead Name Details --}}
                                <input value="{{ $lead->first_name }}" placeholder="First Name" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="first_name" id="first_name">
                                <input value="{{ $lead->middle_name }}" placeholder="Middle Name" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="middle_name" id="middle_name">
                                <input value="{{ $lead->last_name }}" placeholder="Last Name" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="last_name" id="last_name">

                                {{-- Lead Contact Detail --}}
                                <input value="{{ $lead->emails[0]->email }}" placeholder="Contact Email" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="emails[][email]" id="email">
                                <input value="{{ $lead->emails[1]->email }}" placeholder="Other Email" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="emails[][email]" id="other_email">
                                <input value="{{ $lead->phones[0]->phone }}" placeholder="Contact Number" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="phones[][phone]" id="contact_number">
                                <input value="{{ $lead->phones[1]->phone }}" placeholder="Other Contact Number" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="phones[][phone]" id="other_number">

                                {{-- Status And Referral --}}
                                <select class="md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Status" name="status" id="status">
                                    @foreach ($statuses as $s)
                                        <option value="{{ $s->id }}" {{ $s->name == $lead->getStatus()->first()->name ? 'selected' : '' }}>{{ $s->name }}</option>
                                    @endforeach
                                </select>
                                <select class="md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Referral Source" name="referral_source" id="referral">
                                    @foreach ($referrals as $r)
                                        <option value="{{ $lead->referral_source }}" {{ $r == $lead->referral_source ? 'selected' : '' }}>{{ $r }}</option>
                                    @endforeach
                                </select>

                                {{-- Position and Industry --}}
                                <input value="{{ $lead->position_title }}" placeholder="Position Title" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="position_title" id="position_title">
                                <input value="{{ $lead->industry }}" placeholder="Industry" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="industry" id="industry">

                                {{-- Project Type and Company --}}
                                <select class="md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Project Type" name="project_type" id="project">
                                    @foreach ($projecttypes as $p)
                                        <option value="{{ $lead->project_type }}" {{ $p == $lead->project_type ? 'selected' : '' }}>{{ $p }}</option>
                                    @endforeach
                                </select>
                                <input value="{{ $lead->company }}" placeholder="Company" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="company" id="company">
                                
                                {{-- Budget, LinkedIn and Website --}}
                                <input value="{{ $lead->budget }}" placeholder="Budget" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="budget" id="budget">
                                <input value="{{ $lead->website }}" placeholder="Website" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="website" id="website">
                                <input value="{{ $lead->linkedin }}" placeholder="Linkedin" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="linkedin" id="linkedin">

                                {{-- Project Description and Description --}}
                                <textarea name="project_description" placeholder="Project Description" id="project_description" cols="30" rows="10" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $lead->project_description }}</textarea>
                                <textarea name="description" placeholder="Description" id="description" cols="30" rows="10" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $lead->description }}</textarea>


                                {{-- Address Street and City --}}
                                <textarea name="address_street" placeholder="Address Street" id="address_street" cols="30" rows="3" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $lead->address_street }}</textarea>
                                <textarea name="address_city" placeholder="Address City" id="address_city" cols="30" rows="3" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $lead->address_city }}</textarea>

                                {{-- Address Country and Zipcode --}}
                                <input value="{{ $lead->address_state }}" placeholder="Address State" class="md:col-span-2 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="address_state" id="address_state">
                                <input value="{{ $lead->address_country }}" placeholder="Address Country" class="md:col-span-2 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="address_country" id="address_country">
                                <input value="{{ $lead->address_zipcode }}" placeholder="Address Zipcode" class="md:col-span-2 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="address_zipcode" id="address_zipcode">
                            </div>
                            <input class="py-2 px-3 transition duration-500 text-white hover:text-black bg-green-400 rounded-sm shadow-sm" type="submit" value="Update Lead">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
  