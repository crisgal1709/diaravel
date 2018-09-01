<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtitle Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('subtitle', 'Subtitle:') !!}
    {!! Form::textarea('subtitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Important Field -->
<div class="form-group col-sm-12">
    {!! Form::label('important', 'Important:') !!}
    {!! Form::textarea('important', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- User Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::textarea('user_id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Important Field -->
<div class="form-group col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <input type="file" name="archives[]" class="form-control">
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('abouts.index') !!}" class="btn btn-default">Cancel</a>
</div>
