<!DOCTYPE html>
<html lang="en">

<!-- Common Head -->
@include('common.admin-head')
<!-- End Common Head -->


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back</h1>
							<p class="lead">
								Sign in to your account to get access
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="POST" action="{{ route('login') }}">
                                        @csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" id="" name="email" placeholder="Enter your email">
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password">
                                            @if (Route::has('password.request'))
											<small>
												<a href="{{ route('password.request') }}">Forgot password?</a>
											</small>
                                            @endif
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	@include('common.common-js')
</body>

</html>
