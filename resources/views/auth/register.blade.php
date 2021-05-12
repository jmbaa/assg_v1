<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="{{ URL::to('images/icon.png') }}"  width="250" height="250">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Бүртгэл</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off" action="{{ route('register') }}">
                                @csrf

								@if ( Session::get('success'))
									<div class="alert alert-success">
										{{ Session::get('success')}}
									</div>
								@endif

								@if ( Session::get('error'))
									<div class="alert alert-danger">
										{{ Session::get('error')}}
									</div>
								@endif

								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Нэр</label>
									<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
								</div>
                                <span class="text-danger"> @error('name') {{ $message }} @enderror </span>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="phone">Утасны дугаар</label>
									<input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
								</div>
                                <span class="text-danger"> @error('phone') {{ $message }} @enderror </span>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Цахим хаяг</label>
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
								</div>
                                <span class="text-danger"> @error('email') {{ $message }} @enderror </span>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Нууц үг</label>
									<input id="password" type="password" class="form-control" name="password" required>
								</div>
                                <span class="text-danger"> @error('password') {{ $message }} @enderror </span>

                                <div class="mb-3">
									<label class="mb-2 text-muted" for="password-confirm">Нууц үг дахин оруулах</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
								</div>

								<p class="form-text text-muted mb-3">
									Та бүртгүүлсэнээр манай санд буй киног түрээслэн үзэх боломжтой.
								</p>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">
										Бүртгүүлэх	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Та бүртгэлтэй юу? <a href="{{ route('login') }}" class="text-dark">Нэвтрэх</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2021 &mdash; Бие даалт 4
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>