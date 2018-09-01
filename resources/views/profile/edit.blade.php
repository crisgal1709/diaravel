@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Profile - Admin
        </h1>
   </section>
   <div class="content">
    @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">

           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'patch', 'files' => true]) !!}

                   <!-- Name Field -->
                   <div class="form-group col-sm-12">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group col-sm-12">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group col-sm-12">
                    {!! Form::label('password', 'password:') !!}
                    <input type="password" name="password" autocomplete="false" class="form-control">
                    <span class="help-block">
                      Please leave blank to not change
                    </span>
                  </div>

                  <!-- Submit Field -->
                  <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                  </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection