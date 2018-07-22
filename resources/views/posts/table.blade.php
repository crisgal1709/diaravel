<table class="table table-responsive datatable" id="posts-table">
    <thead>
        <tr>
            <th>Title</th>
        {{-- <th>Body</th> --}}
        <th>Excerpt</th>
        <th>Slug</th>
        <th>Published</th>
        <th>Author</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{!! $post->title !!}</td>
            {{-- <td>{!! $post->body !!}</td> --}}
            <td>{!! substr($post->excerpt, 0, 20) . '...' !!}</td>
            <td>{!! $post->slug !!}</td>
            <td>{!! $post->published == 1 ? 'Yes' : 'Not' !!}</td>
            <td>
                {{ $post->author->name }}
            </td>
            <td>
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                <div class='btn-group'>

                    @if ($post->published)
                           <a href="{!! route('posts.publishe', [$post->id]) !!}" class='btn btn-warning btn-xs' title="Marcar como no publicado">
                            <i class="fa fa-remove"></i>
                        </a>
                    @else 
                     <a href="{!! route('posts.publishe', [$post->id]) !!}" class='btn btn-success btn-xs' title="Publicar">
                        <i class="fa fa-check"></i>
                    </a>
                   @endif

                    <a href="{!! route('posts.edit', [$post->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>