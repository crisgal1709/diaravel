@extends('front.layouts.layout')

@section('content')
<!--About Section-->
<section class="about-section">
	<div class="auto-container">
		<div class="row clearfix">
			<!--Title Column-->
			<div class="title-column col-md-6 col-sm-12 col-xs-12">
				<h2>Ya que estás aquí <br> Déjame presentarme</h2>
				<div class="sub-title">Usualmente esta sería una página para presentar algún producto <br> ¿No es eso en ocaciones desesperante?.</div>
			</div>
			<!--Content Column-->
			<div class="content-column col-md-6 col-sm-12 col-xs-12">
				<div class="text">
					<p>
						Mi nombre es Cristian Galeano, soy desarrollador PHP a tiempo completo, trabajo con el Framework <a href="https://laravel.com">Laravel</a> desarrollando soluciones para empresas y privados. 
					</p>

					<p>
						Gracias a la experiencia ganada en estos tiempos, he decidido plasmar en este pequeño blog mi día a día, así, puedo contribuir a las personas que apenas empiezan, e incluso a los ya experimientados, no solo con mis conocimientos, sino, con eso que no sabemos y podemos aprender en el transcurso de nuestro trabajo.
					</p>

					<p>Y es que Laravel es un Framework tan grande que, conocerlo a fondo es algo no imposible, pero sí complicado</p>
				</div>
			</div>
		</div>

		<blockquote>
			<div class="blockquote-text">
				En ocaciones podemos pasar horas y horas buscando una solución y esta puede estar ahí, en nuestras narices, y no nos damos cuenta.
				También hay cosas muy puntuales de las que no se encuentra información tan fácilmente
			</div>
		</blockquote>

	</div>
</section>
<!--End About Section-->

<!--Services Section-->
<section class="services-section">
	<div class="auto-container">
		<div class="image">
			<img src="/front/images/resource/services.jpg" alt="" />
		</div>
		{{-- <div class="row clearfix">
			<div class="content-column col-md-6 col-sm-12 col-xs-12">
				<h2>Our Services</h2>
				<div class="text">
					<p>Rganically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a newBring to the table win-win survival strategies </p>
					<p>to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation on the runway heading towards a streamlined cloud solutionempowerment.Bring to the table win-win survival strategies to ensure proactive domination. At the end of theure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation on the runway heading towards a streamlined cloud solutionempow.</p>
				</div>
			</div>
			<div class="blocks-column col-md-6 col-sm-12 col-xs-12">
				<div class="inner-column">
					<div class="row clearfix">

						<!--Services Block-->
						<div class="services-block col-md-6 col-sm-6 col-xs-12">
							<div class="inner">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-settings-2"></span>
									</div>
									<h3>Branding & <br> Identity</h3>
								</div>
								<a href="#" class="overlay-link"></a>
							</div>
						</div>

						<!--Services Block-->
						<div class="services-block col-md-6 col-sm-6 col-xs-12">
							<div class="inner">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-computer-1"></span>
									</div>
									<h3>Web <br> Development</h3>
								</div>
								<a href="#" class="overlay-link"></a>
							</div>
						</div>

						<!--Services Block-->
						<div class="services-block col-md-6 col-sm-6 col-xs-12">
							<div class="inner">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-shield-2"></span>
									</div>
									<h3>Seo <br> Security</h3>
								</div>
								<a href="#" class="overlay-link"></a>
							</div>
						</div>

						<!--Services Block-->
						<div class="services-block col-md-6 col-sm-6 col-xs-12">
							<div class="inner">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-copy-1"></span>
									</div>
									<h3>Content <br> Management</h3>
								</div>
								<a href="#" class="overlay-link"></a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div> --}}
	</div>
</section>
<!--End Services Section-->
@endsection