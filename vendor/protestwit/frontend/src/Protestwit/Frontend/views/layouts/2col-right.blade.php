<!DOCTYPE html>
<html>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
	<title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    @yield('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="/js/app.js"></script>
	@yield('scripts')

</head>
<body class="minimal">
	<div class="container">
		<div id="header_row" class="row">
			<div id="header_row" class="col-md-9">
				<div id="header_div">
					<h2 id="header">
						<span id="header_student">Protestwit</span>
					</h2>
				</div>
			</div>
			<div class="col-md-3 text-right">
				<a href="/" title="Home">
					@todo Logo
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				@yield('top')
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<div class="inner-content">
					@yield('content')
				</div>
			</div>
			<div class="col-md-3">
				@yield('right')
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@yield('bottom')
			</div>
		</div>
	</div>
	<script src="/js/app.js"></script>
</body>
</html>