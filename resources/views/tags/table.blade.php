<table class="table table-responsive datatable" id="tags-table">
    <thead>
        <tr>
            <th>Name</th>
        {{-- <th>User Id</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tags as $tag)
        <tr>
            <td>{!! $tag->name !!}</td>
            {{-- <td>{!! $tag->user_id !!}</td> --}}
            <td>
                {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tags.show', [$tag->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tags.edit', [$tag->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>