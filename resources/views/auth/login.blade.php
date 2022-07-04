<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login | Apex Realty CRM</title>

	<link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<main>
		<section class="absolute w-full h-full">
			<div class="absolute top-0 w-full h-full bg-gradient-to-b">
			</div>
			<div class="container mx-auto px-4 h-full">
				<div class="flex content-center items-center justify-center h-full">
					<div class="w-full lg:w-4/12 px-4">
						<div class="relative login-logo text-center center-block mb-3">
							<a href="{{ url('/') }}"><b>Apex Realty CRM</b></a>
							<p class="login-box-msg">Welcome, please login to your dashboard.</p>
						</div>
						<div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg border-0 glass-box">
							<div class="flex-auto px-4 lg:px-10 py-10">
								<form action="{{ route('login.post') }}" method="POST" role="form">
									@csrf
									<div class="relative w-full mb-3">
										<label class="block uppercase text-gray-700 text-xs font-bold mb-2"
											for="grid-password">Email</label>
										<input 
											type="email"
											name="email" 
											id="email"
											class="border border-black px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow w-full invalid:border-red-500 ring-0 form-control"
											placeholder="Email" 
											style="transition: all 0.15s ease 0s;" 
										/>
									</div>
									<div class="relative w-full mb-3">
										<label class="block uppercase text-gray-700 text-xs font-bold mb-2"
											for="grid-password">Password</label>
										<input 
											type="password"
											name="password" 
											id="password"
											class="border border-black px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow w-full invalid:border-red-500 ring-0 form-control"
											placeholder="Password"
											style="transition: all 0.15s ease 0s;" 
										/>
									</div>
									@if($errors->all())
										@foreach ($errors->all() as $error)
										<span class="block first-line:text-red-500 text-sm mt-2">{{ $error }}</span>
										@endforeach
									@endif
									<div class="text-center mt-6">
										<button
											class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
											type="submit" style="transition: all 0.15s ease 0s;">
											Sign In
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
</body>

</html>