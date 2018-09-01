<table class="table table-responsive" id="socialNetworks-table">
    <thead>
        <tr>
        <th>Name</th>
        <th>Icon</th>
        <th>Link</th>
        <th>Status</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($socialNetworks as $socialNetwork)
        <tr>
            <td>{!! $socialNetwork->name !!}</td>
            <td>{!! $socialNetwork->icon !!}</td>
            <td>{!! $socialNetwork->link !!}</td>
            <td>{!! $socialNetwork->status !!}</td>
            <td>
                {!! Form::open(['route' => ['socialNetworks.destroy', $socialNetwork->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('socialNetworks.show', [$socialNetwork->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('socialNetworks.edit', [$socialNetwork->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>