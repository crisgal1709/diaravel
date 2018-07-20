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
<!-- Stylesheets -->
<link href="/front/css/bootstrap.css" rel="stylesheet">
<link href="/front/css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="/front/images/favicon.png" type="image/x-icon">
<link rel="icon" href="/front/images/favicon.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="/front/css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="/front/js/respond.js"></script><![endif]-->
</head>

<body>