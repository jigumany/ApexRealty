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
                    <div class="form-container bg-white p-4 rounded-sm">
                        <form action="#" method="POST" class="leads-form">
                            @csrf
                            <div class="inner-form grid grid-cols-6 gap-2 gap-y-0 grid-flow-row">
                                {{-- Lead Name Details --}}
                                <input placeholder="First Name" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="first-name" id="first-name">
                                <input placeholder="Middle Name" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="middle-name" id="middle-name">
                                <input placeholder="Last Name" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="last-name" id="last-name">

                                {{-- Status And Referral --}}
                                <select class="md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Status" name="status_id" id="status">
                                    <option placeholder="Assign Status" value="Assign Status" class="text-gray-700">Assign Status</option>
                                </select>
                                <select class="md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Referral Source" name="referral" id="referral">
                                    <option placeholder="Referral Source" value="Referral Source" class="text-gray-700">Referral Source</option>
                                </select>

                                {{-- Position and Industry --}}
                                <input placeholder="Position Title" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="position-title" id="position-title">
                                <input placeholder="Industry" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="industry" id="industry">

                                {{-- Project Type and Company --}}
                                <select class="md:col-span-3 col-span-6 w-full mb-3 py-2 px-3 border rounded-sm shadow-sm text-gray-700 focus:outline-none focus:shadow-outline" placeholder="Project Type" name="project" id="project">
                                    <option placeholder="Project Type" value="Project Type" class="text-gray-700">Project Type</option>
                                </select>
                                <input placeholder="Company" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="company" id="company">

                                {{-- Project Description and Description --}}
                                <textarea name="project_description" placeholder="Project Description" id="project_description" cols="30" rows="10" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                <textarea name="description" placeholder="Description" id="description" cols="30" rows="10" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>

                                {{-- Budget, LinkedIn and Website --}}
                                <input placeholder="Budget" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="budget" id="budget">
                                <input placeholder="Website" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="website" id="website">
                                <input placeholder="Linkedin" class="lg:col-span-2 md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="linked" id="linked">

                                {{-- Address Street and City --}}
                                <textarea name="address_street" placeholder="Address Street" id="address_street" cols="30" rows="3" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                <textarea name="address_city" placeholder="Address City" id="address_city" cols="30" rows="3" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>

                                {{-- Address Country and Zipcode --}}
                                <input placeholder="Address Country" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="address_state" id="address_state">
                                <input placeholder="Address Zipcode" class="md:col-span-3 col-span-6 mb-3 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="address_zipcode" id="address_zipcode">
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
  