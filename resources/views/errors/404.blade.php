@extends('front.layouts.layout')

@section('content')
	<div class="well text-center">
		<h1>
			PÁGINA NO ENCONTRADA
		</h1>

		<p>
			No hemos podido encontrar lo que buscabas :/	
		</p>	


		<div class="row">

			<div class="col-sm-8 col-sm-offset-2 col-xs-12">
				<form method="GET" action="{{ route('frontend.search') }}">
                    <div class="form-group" style="width: 100%; ">
                        <input type="search" class="form-control" name="s" value="" placeholder="Buscar" required style="padding: 10px; width: 100%">
                    </div>
                    <button href="#" class="btn btn-default">Buscar</button>
                </form>
			</div>
			
		</div>

	</div>
@endsection