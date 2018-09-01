@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Social Network
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($socialNetwork, ['route' => ['socialNetworks.update', $socialNetwork->id], 'method' => 'patch']) !!}

                        @include('social_networks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection