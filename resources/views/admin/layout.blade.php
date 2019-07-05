<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-KTP') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/simplefinder.js') }}" defer></script>
	<script src="{{ asset('js/categoryarea.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <!-- Links -->
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.landing.index') }}">Dashboard</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.book.index') }}">Buku</a>
			</li>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.pelanggan.index') }}">Pelanggan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.pustakawan.index') }}">Pustakawan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.jobdesc.index') }}">Jenis Pekerjaan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.bookcategory.index') }}">Kategori Buku</a>
			</li>
		</ul>
	</nav>
	@yield('content')
</body>
</html>