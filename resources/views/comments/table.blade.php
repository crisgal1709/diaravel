<div class="table-responsive">
    <table class="table table-condensed datatable" id="comments-table">
    <thead>
        <tr>
            <th>Type</th>
            <th>Entrada</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>
                @if ($comment->comment_id == 0)
                    {{ 'Comentario' }}
                    @else 
                    {{ 'Respuesta' }}
                @endif
            </td>
            <td>
                {{ $comment->present()->post() }}
            </td>
            <td>
                {{ $comment->present()->approved() }}
            </td>
            <td>
                {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>

                   @if ($comment->approved)
                           <a href="{!! route('comments.approve', [$comment->id]) !!}" class='btn btn-warning btn-xs' title="Desaprobar">
                            <i class="fa fa-remove"></i>
                        </a>
                    @else 
                     <a href="{!! route('comments.approve', [$comment->id]) !!}" class='btn btn-success btn-xs' title="Aprobar">
                        <i class="fa fa-check"></i>
                    </a>
                   @endif


                    <a href="{!! route('comments.edit', [$comment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

@push('scripts')
   
@endpush