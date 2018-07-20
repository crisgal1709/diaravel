@extends('front.layouts.layout')



@section('content')
	<div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Side / Our Blog-->
                <div class="content-side col-md-8 col-sm-12 col-xs-12">
                	<div class="blog-single">
						<div class="inner-box">

                        	<div class="image">
                            	{{ $post->present()->thumbnail() }}
                            </div>

                            <div class="lower-content">
                            	<div class="post-info">
                                    Creative 

                                    /
                                    Nov 26,2018 
                                    / 
                                    By Admin	
                                </div>

                                <h2>{{ $post->title }}</h2>

                                <div class="text">
                                	{{ $post->present()->body() }}
                                </div>
								
								<!--Icons share-->
                                @include('front.partials.share')

                            </div>
                        </div>
                    </div>
                    
                    <!--Comments Area-->
                    @include('front.partials.comments-post')
                    <!--End Comments Area-->
                    
                    <!-- Comment Form -->
                    @include('front.partials.comment-form')
                    <!--End Comment Form --> 
                    
                </div>
                
                <!--Sidebar Side-->
                <div class="sidebar-side col-md-4 col-sm-12 col-xs-12">
                	<aside class="sidebar">
						
                        <!-- Search -->
                        @include('front.partials.sidebar.search-form')
                        
                        <!--Category Blog-->
                        @include('front.partials.sidebar.categories')
                        
                        
                        <!--News-->
                        @include('front.partials.sidebar.recent-posts')
                        
                        <!-- Popular Tags -->
                        @include('front.partials.sidebar.tags')
                        
					</aside>
                </div>
                
            </div>
        </div>
    </div>
@endsection