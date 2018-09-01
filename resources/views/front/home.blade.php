@extends('front.layouts.layout')



@section('content')
	<!--News List Section-->
    <section class="news-list-section">
        <div class="auto-container">

            @if (isset($is_tag) && $is_tag)
                <div class="well">
                    <h3 class="text-center">
                        Entrys of the tag : <strong>{{ $tag->name }}</strong>
                    </h3>
                </div>                      
            @endif

            @if (isset($is_category) && $is_category)
                <div class="well">
                    <h3 class="text-center">
                        Entrys of the categorie : <strong>{{ $category->name }}</strong>
                    </h3>
                </div>                      
            @endif

            @if (isset($is_search) && $is_search)
                <div class="well">
                    <h3 class="text-center">
                        Results for the search : <strong>{{ $searchTerm }}</strong>
                    </h3>
                </div>                      
            @endif

            @if (isset($_GET['page']))
                <div class="well">
                    <h3 class="text-center">
                        Page {{ $_GET['page'] }}
                    </h3>
                </div>  
            @endif

            @if ($posts->count() < 1)
                <div class="well">
                    <h3 class="text-center">
                        No articles available
                    </h3>
                </div>  
            @endif
            
            <!--News Block Two-->
            @foreach ($posts as $post)

            <div class="news-block-two" id="post-{{ $post->id }}">
                <div class="inner-box">
                    <div class="row clearfix">
                        <!--Image Column-->
                        <div class="image-column col-md-4 col-sm-12 col-xs-12">
                            <div class="image">
                                {{ $post->present()->thumbnail() }}
                                <div class="overlay-box">
                                    <a href="{{ route('frontend.post', $post->slug) }}" class="link-box"><span class="flaticon-link"></span></a>
                                </div>
                            </div>
                        </div>
                        <!--Content Column-->
                        <div class="content-column col-md-8 col-sm-12 col-xs-12">
                            <div class="inner-column">

                                <div class="post-info"> 
                                {{ $post->present()->getCategories() }}

                                 <br>

                                {{ $post->present()->getPublishedDate() }}

                                <br>

                                Por {{ $post->present()->authorName() }}
                                </div>

                                <h3>
                                    <a href="{{ route('frontend.post', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>


                                <div class="text">
                                    {{ $post->present()->excerpt(100) }}
                                </div>

                                <ul class="post-meta clearfix">

                                    <li class="pull-right">
                                        <a href="{{ route('frontend.post', $post->slug) }}">
                                            <span class="icon fa fa-comment-o"></span>
                                            {{ $post->comments->count() }}
                                        </a>
                                    </li>

                                    <li class="pull-left">
                                        {{ $post->present()->getTags() }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            {{-- <div class="text-center">
                <a href="#" class="theme-btn load-btn btn-style-one">Cargar más</a>
            </div> --}}
            
        </div>
    </section>
    <!--End News Section-->
    
    <!--News Posts-->
    {{ $posts->links() }}
    {{-- <div class="new-posts">

        <div class="clearfix">

            <div class="pull-left">
                <a href="#" class="prev">
                    <span class="fa fa-long-arrow-left"></span> 
                    Anterior
                </a>
            </div>

            <a href="#" class="grid-btn"><span class="fa fa fa-th"></span></a>

            <div class="pull-right">
                <a href="#" class="next">
                    Siguiente 
                    <span class="fa fa-long-arrow-right"></span>
                </a>
            </div>
        </div> --}}
    </div>
    <!--End News Posts-->
@endsection