@extends('front.layouts.layout')

@section('content')
<!--About Section-->
<section class="about-section">
	<div class="auto-container">
		<div class="row clearfix">
			<!--Title Column-->
			<div class="title-column col-md-6 col-sm-12 col-xs-12">
				<h2>
					{{ $about->present()->title() }}
				</h2>
				<div class="sub-title">
					{{ $about->present()->subtitle() }}
				</div>
			</div>
			<!--Content Column-->
			<div class="content-column col-md-6 col-sm-12 col-xs-12">
				<div class="text">
					{{ $about->present()->content() }}
				</div>
			</div>
		</div>

		<blockquote>
			<div class="blockquote-text">
				{{ $about->present()->important() }}
			</div>
		</blockquote>

	</div>
</section>
<!--End About Section-->

<!--Services Section-->
<section class="services-section">
	<div class="auto-container">
		<div class="image">
			{{ $about->present()->image() }}
		</div>
	</div>
</section>
<!--End Services Section-->
@endsection