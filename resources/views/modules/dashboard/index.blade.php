@extends('layouts.app')
@section('content')

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="dashboard-cards grid gap-4 lg:grid-cols-4 lg:grid-rows-3 md:grid-cols-2 mb-5">
						<x-dashboard-card title='Users' count="1" />
						<x-dashboard-card title='Leads' count="12" />
						<x-dashboard-card title='Active Leads' count="20" />
						<x-dashboard-card title='Completed Leads' count="100" />
                    </div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection