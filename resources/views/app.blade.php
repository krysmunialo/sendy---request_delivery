<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sendy</title>
	<link rel="shortcut icon" href="{{ URL::to('/') }}/images/logo.png">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<style type="text/css">
		.brief{
			color:#BD2131;
			text-align: center;
			font-weight: 200;
			font-size: 15px;
		}
		.briefcontents{
			text-align: center;
		}
		.banner{
			background-color: #1892BF;
			background-size: cover;
			width: 100%;
			height: 100%;
			/*min-height: 400px;*/
			font-style: italic;
		}
		.banner h1{
			text-align: center;
			color: #FFF;
			font-size: 25px;
			font-weight: 300;
			line-height: 500px;
			margin-top: 10px;
			padding: 10em, 10em;
		}
	</style>
	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}">Home</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				
				<ul class="nav navbar-nav navbar-right">
					@if(auth()->guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}"><i class="fa fa-sign-in"></i> Sign In</a></li>
						@endif
						@if(!Request::is('auth/register'))
							<li></i><a href="{{ url('/auth/register') }}">Register</a></li>
						@endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	@yield('content')
	
	<div class="brief">
		Get Started
	</div>
	<div class="briefcontents">
		Sign in or register to <a href="{{ url('/orders/create') }}"> make a request </a> for package delivery
	</div>	
	<div class="banner">
		<h1>On-demand, door-to-door, package
		delivery services. 24/7.</h1>
	</div>


	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
