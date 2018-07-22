<li class="{{ Request::is('posts*') ? 'active' : '' }}">
    <a target="_blank" href="{{ url('') }}"><i class="fa fa-home"></i><span>Visitar sitio</span></a>
</li>

<li class="{{ Request::is('posts*') ? 'active' : '' }}">
    <a href="{!! route('posts.index') !!}"><i class="fa fa-file"></i><span>Posts</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-list-alt"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('tags*') ? 'active' : '' }}">
    <a href="{!! route('tags.index') !!}"><i class="fa fa-tag"></i><span>Tags</span></a>
</li>

<li class="{{ Request::is('comments*') ? 'active' : '' }}">
    <a href="{!! route('comments.index') !!}"><i class="fa fa-comments-o"></i><span>Comments</span></a>
</li>

