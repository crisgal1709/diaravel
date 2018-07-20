<table class="table table-responsive" id="actividads-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Estado</th>
        <th>Usuarios Relacionados</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($actividads as $actividad)
        <tr>
            <td>{!! $actividad->nombre !!}</td>
            <td>{!! $actividad->estado !!}</td>
            <td>{!! $actividad->usuarios_relacionados !!}</td>
            <td>{!! $actividad->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['actividads.destroy', $actividad->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('actividads.show', [$actividad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('actividads.edit', [$actividad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>