@extends('front.layouts.layout')



@section('content')
	<!--News List Section-->
    <section class="news-list-section">
        <div class="auto-container">
            
            <!--News Block Two-->
            @foreach ($posts as $post)

            <div class="news-block-two">
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

                                 /

                                {{ $post->present()->getPublishedDate() }}

                                / 

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
                                            <span class="icon fa fa-comment-o"></span>7 Comentarios
                                        </a>
                                    </li>

                                    {{-- <li class="pull-right">
                                        <a href="{{ route('frontend.post', $post->slug) }}">
                                            <span class="icon fa fa-heart-o"></span>32 Like
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            <div class="text-center">
                <a href="#" class="theme-btn load-btn btn-style-one">Cargar más</a>
            </div>
            
        </div>
    </section>
    <!--End News Section-->
    
    <!--News Posts-->
    <div class="new-posts">
        <div class="clearfix">
            <div class="pull-left">
                <a href="#" class="prev"><span class="fa fa-long-arrow-left"></span> Anterior</a>
            </div>
            <a href="#" class="grid-btn"><span class="fa fa fa-th"></span></a>
            <div class="pull-right">
                <a href="#" class="next">Siguiente <span class="fa fa-long-arrow-right"></span></a>
            </div>
        </div>
    </div>
    <!--End News Posts-->
@endsection