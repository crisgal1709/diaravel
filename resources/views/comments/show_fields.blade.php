

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $comment->id !!}</p>
</div>

<!-- Comment Id Field -->
<div class="form-group">
    {!! Form::label('typo', 'Type') !!}
    <p>{!! $comment->present()->type() !!}</p>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status') !!}
    <p>
        {{ $comment->present()->resolveStatus(true) }}
    </p>
    <p>
        {{ $comment->present()->status() }}
    </p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'content:') !!}
    <p>{!! $comment->body !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name Author:') !!}
    <p>{!! $comment->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email Author:') !!}
    <p>{!! $comment->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $comment->created_at !!}</p>
</div>


