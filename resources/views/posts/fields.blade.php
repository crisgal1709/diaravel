<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'editor', 'id' => 'editor', 'rows' => '10']) !!}
</div>

<!-- Excerpt Field -->
<div class="form-group col-sm-12">
    {!! Form::label('excerpt', 'Excerpt:') !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('published', 'published:') !!}
    {!! Form::select('published', ['1' => 'Yes', '0' => 'Not'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('cateogories', 'Categories:') !!}
    <select name="categories[]" id="categories" class="form-control select2" multiple="multiple">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                    
                    @if (isset($post))
                        {{ $post->categories->pluck('id')->contains($category->id) ? 'selected' : '' }}
                    @endif
                
                >
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('thumbnail', 'Thumbnail:') !!}
    <input type="file" multiple="multiple" name="archives[]" class="form-control">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tags', 'Tags:') !!}
    <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" 
                    
                    @if (isset($post))
                        {{ $post->tags->pluck('id')->contains($tag->id) ? 'selected' : '' }}
                    @endif
                
                >
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('posts.index') !!}" class="btn btn-default">Cancel</a>
</div>



@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                height: '450px'

            } )
            .catch( error => {
                console.error( error );
            } );


            $('.select2').select2({
                'tags': true,
                'multiple': true
            });

    </script>

@endpush