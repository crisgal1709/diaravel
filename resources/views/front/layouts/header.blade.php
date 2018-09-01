<!DOCTYPE html>
<html>
<head>
	
<meta charset="utf-8">
<title>
	@if (isset($tituloPagina) && $tituloPagina != '' && $tituloPagina != config('app.name'))
        {{ $tituloPagina . ' - ' . config('app.name') }}
        @else
        {{ config('app.name') }}
        @endif
</title>

<style>

</style>
<!-- Stylesheets -->
<link href="/front/css/bootstrap.css" rel="stylesheet">
<link href="/front/css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="/front/images/favicon.png" type="image/x-icon">
<link rel="icon" href="/front/images/favicon.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="/front/css/responsive.css" rel="stylesheet">
<link rel="stylesheet" href="/adminlte/alertifyjs/css/alertify.min.css">
<link rel="stylesheet" href="/adminlte/alertifyjs/css/themes/semantic.css">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="/front/js/respond.js"></script><![endif]-->

<style>
	.alertify-notifier{
		font-weight: 500!important;
		font-size: 20px!important;
	}
</style>

<script type = 'text/javascript' src = '//platform-api.sharethis.com/js/sharethis.js#property=5b8b196d59ed1f001188afe4&product=sticky-share-buttons' async = 'async'></script>


<meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<div class="sharethis-inline-share-buttons"></div>


<body>