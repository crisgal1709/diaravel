<table class="table table-responsive" id="abouts-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Subtitle</th>
        <th>Content</th>
        <th>Important</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($abouts as $about)
        <tr>
            <td>{!! $about->title !!}</td>
            <td>{!! $about->subtitle !!}</td>
            <td>{!! $about->content !!}</td>
            <td>{!! $about->important !!}</td>
            <td>{!! $about->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['abouts.destroy', $about->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('abouts.show', [$about->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('abouts.edit', [$about->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>