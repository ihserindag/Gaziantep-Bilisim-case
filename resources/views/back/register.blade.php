<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from spark.bootlab.io/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 15:52:37 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
	<meta name="author" content="Bootlab">

	<title>Gaziantep Bilişim</title>

	@include('back.layouts.style')

	<!-- END SETTINGS -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-7');
</script></head>
<!-- SET YOUR THEME -->

<body class="theme-blue">
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<main class="main h-100 w-100">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Hoşgeldiniz</h1>
							<p class="lead">
								Lütfen bilgilerinizi girip kayıt olunuz.
							</p>
                            @if ($errors->any())
                            <div class="alert alert-danger p-3 text-center">
                                {{ $errors->first() }}
                            </div>


                            @endif
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">

									<form method="post" action="{{ route('register.post') }}">
                                        @csrf

                                        <div class="mb-3">
											<label>Ad Soyad</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Lütfen Ad Soyad giriniz" required />
										</div>


										<div class="mb-3">
											<label>Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Lütfen emailinizi giriniz" required/>
										</div>
										<div class="mb-3">
											<label>Şifre</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Lütfen Şifrenizi Giriniz" required/>

										</div>

										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Kayıt Ol</button>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->


										</div>

									</form>

								</div>
                                <a href="{{ route('register') }}">Kayıt Ol</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>


    @include('back.layouts.script')
</body>



</html>
