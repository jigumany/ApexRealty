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
                        <form action="{{ route('leads.store') }}" method="POST" class="leads-form">
                            @csrf
                            <div class="inner-form grid grid-cols-6 gap-2 gap-y-0 grid-flow-row">
                                {{-- Lead Name Details --}}
                                <input placeholder="First Name" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="first_name" id="first_name">
                                <input placeholder="Middle Name" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="middle_name" id="middle_name">
                                <input placeholder="Last Name" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="last_name" id="last_name">

                                {{-- Lead Contact Detail --}}
                                <input placeholder="Contact Email" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="emails[][email]" id="email">
                                <input placeholder="Other Email" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="emails[][email]" id="other_email">
                                <input placeholder="Contact Number" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="phones[][phone]" id="contact_number">
                                <input placeholder="Other Contact Number" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="phones[][phone]" id="other_number">

                                {{-- Status And Referral --}}
                                <select class="md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Status" name="status" id="status">
                                    <option placeholder="Assign Status" value="Assign Status" class="text-gray-700">Assign Status</option>
                                    @foreach ($statuses as $s)
                                        <option placeholder="{{ $s->name }}" value="{{ $s->id }}" class="text-gray-700">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                                <select class="md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Referral Source" name="referral_source" id="referral">
                                    <option placeholder="Referral Source" value="Referral Source" class="text-gray-700">Referral Source</option>
                                    @foreach ($referrals as $r)
                                        <option placeholder="{{ $r }}" value="{{ $r }}" class="text-gray-700">{{ $r }}</option>
                                    @endforeach
                                </select>

                                {{-- Position and Industry --}}
                                <input placeholder="Position Title" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="position_title" id="position_title">
                                <input placeholder="Industry" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="industry" id="industry">

                                {{-- Project Type and Company --}}
                                <select class="md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Project Type" name="project_type" id="project">
                                    <option placeholder="Project Type" value="Project Type" class="text-gray-700">Project Type</option>
                                    @foreach ($projecttypes as $p)
                                        <option placeholder="{{ $p }}" value="{{ $p }}" class="text-gray-700">{{ $p }}</option>
                                    @endforeach
                                </select>
                                <input placeholder="Company" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="company" id="company">

                                {{-- Budget, LinkedIn and Website --}}
                                <input placeholder="Budget" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="budget" id="budget">
                                <input placeholder="Website" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="website" id="website">
                                <input placeholder="Linkedin" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="linkedin" id="linkedin">

                                {{-- Project Description and Description --}}
                                <textarea name="project_description" placeholder="Project Description" id="project_description" cols="30" rows="10" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                <textarea name="description" placeholder="Description" id="description" cols="30" rows="10" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>

                                {{-- Address Street and City --}}
                                <textarea name="address_street" placeholder="Address Street" id="address_street" cols="30" rows="3" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                <textarea name="address_city" placeholder="Address City" id="address_city" cols="30" rows="3" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>

                                {{-- Address Country and Zipcode --}}
                                <input placeholder="Address State" class="md:col-span-2 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="address_state" id="address_state">
                                <input placeholder="Address Country" class="md:col-span-2 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="address_country" id="address_country">
                                <input placeholder="Address Zipcode" class="md:col-span-2 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="address_zipcode" id="address_zipcode">
                            </div>
                            <input class="py-2 px-3 transition duration-500 text-white hover:text-black bg-green-400 rounded-sm shadow-sm" type="submit" value="Create Lead">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
  