<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login | Apex Realty CRM</title>

	<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
	<link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<main class="w-full">
		<section class="relative w-full h-full py-40 min-h-screen" style="background: linear-gradient(to right, #4ca1af, #c4e0e5);">
			<div class="absolute"></div>
			<div class="container mx-auto px-4 h-full">
				<div class="flex content-center items-center justify-center h-full">
					<div class="w-full lg:w-4/12 px-4">
						<div class="logo mb-2 w-8/12 mx-auto">
							<img src="{{ asset('images/Black-Logo-transparent.png') }}" alt="logo">
						</div>
						<div
							class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
							<div class="flex-auto px-4 lg:px-10 py-4">
								<form action="{{ route('login.post') }}" method="POST" role="form">
									@csrf
									<div class="relative w-full mb-3">
										<label
											class="block uppercase text-white text-xs font-bold mb-2"
											for="email">
											Email</label>
										<input 
											type="email"
											name="email" 
											id="email"
											class="form-input border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
											placeholder="Email" 
											autocomplete="off"
											style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
									</div>

									<div class="relative w-full mb-3">
										<label
											class="block uppercase text-white text-xs font-bold mb-2"
											for="password">
											Password
										</label>
										<input 
											type="password"
											name="password" 
											id="password"
											class="form-input border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
											placeholder="Password" 
											autocomplete="off"
											style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
									</div>
									<div>
										<label class="inline-flex items-center cursor-pointer">
											<input
												id="customCheckLogin" 
												type="checkbox"
												class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
											<span class="ml-2 text-sm font-semibold text-blueGray-600">
												Remember me
											</span>
										</label>
									</div>
									@if($errors->all())
										@foreach ($errors->all() as $error)
											<span class="block text-red-500 text-sm mt-2">{{ $error }}</span>
										@endforeach
									@endif
									<div class="text-center mt-6">
										<button
											class="bg-[#f9f122] text-black active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
											type="submit">
											Sign In
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="flex flex-wrap mt-6 relative">
							<div class="w-1/2">
								<a 
									href="#"
									class="text-blueGray-200">
									<small>Forgot password?</small>
								</a>
							</div>
							<div class="w-1/2 text-right">
								<a 
									href="/notus-svelte/auth/register"
									class="text-blueGray-200">
									<small>Create new account</small>
								</a>
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