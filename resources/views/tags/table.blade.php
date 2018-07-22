<table class="table table-responsive datatable" id="tags-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Posts</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tags as $tag)
        <tr>
            <td>{!! $tag->name !!}</td>
            <td>
                {{ $tag->posts->count() }}
            </td>
            <td>
                {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete']) !!}
                <div class='btn-group'>

                    <a target="_blank" href="{!! route('frontend.tag', [$tag->slug]) !!}" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>

                    <a href="{!! route('tags.edit', [$tag->id]) !!}" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>

                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>