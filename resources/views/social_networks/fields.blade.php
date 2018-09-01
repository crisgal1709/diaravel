<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Icon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icon', 'Icon:') !!}
    {!! Form::text('icon', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    <h6>Icons</h6>
    <div class="row">
        <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-facebook">
                <i class="fa fa-facebook"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-twitter">
                <i class="fa fa-twitter"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-google-plus">
                <i class="fa fa-google-plus"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-pinterest-p">
                <i class="fa fa-pinterest-p"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-dribbble">
                <i class="fa fa-dribbble"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-youtube">
                <i class="fa fa-youtube"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-instagram">
                <i class="fa fa-instagram"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-github">
                <i class="fa fa-github"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-linkedin">
                <i class="fa fa-linkedin"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-bitbucket">
                <i class="fa fa-bitbucket"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a href="#" class="iconList" aria-icon-name="fa-gitlab">
                <i class="fa fa-gitlab"></i>
            </a>
        </div>

         <div class="col-sm-2">
            <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/" class="">
                More...
            </a>
        </div>
    </div>
</div>

<!-- Link Field -->
<div class="form-group col-sm-12">
    {!! Form::label('link', 'Link:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', [1 => 'Active', 2 => 'Inactive'], null, ['class' => 'form-control'] ) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('socialNetworks.index') !!}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
    <script>
        $(document).on('click', 'a.iconList', function(e){
            e.preventDefault();

            var icon = $(this).attr('aria-icon-name');

            $('input[name=icon]').val(icon);
        })
    </script>
@endpush
