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
                                 {{ $post->present()->getCategories() }}

                                 <br>

                                 {{ $post->present()->getPublishedDate() }}

                                 <br>

                                 Por {{ $post->present()->authorName() }}
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

@push('scripts')
    <script>
        globalPostId = {{ $post->id }}

        if (localStorage.hasOwnProperty('nombreComentador')) {
            $('#formComments input[name=name]').val(localStorage.getItem('nombreComentador'));
        }

        if (localStorage.hasOwnProperty('emailComentador')) {
            $('#formComments input[name=email]').val(localStorage.getItem('emailComentador'));
        }

        $(document).on('keyup', 'textarea[name=body]', function(e){
            if ($(this).val() == '') {
                $('button[name=submit-form]').attr('disabled', 'disabled');
            } else {
                $('button[name=submit-form]').removeAttr('disabled')
            }
        })

        $(document).on('submit', '#formComments', function(e){
            e.preventDefault();

            var nombre = $('#formComments input[name=name]').val();
            var email = $('#formComments input[name=email]').val();
            var body = $('#formComments textarea[name=body]').val().trim();

            if (nombre == '') {
                alert('Escribe tu nombre');
                return;
            }

            if (body == '') {
                alert('Escribe tu comentario');
                $('button[name=submit-form]').attr('disabled', 'disabled');
                return;
            }

            localStorage.setItem('nombreComentador', nombre);
            localStorage.setItem('emailComentador', email);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'json',
                cache: false,
                data: {
                    _token: $('#formComments input[name=_token]').val(),
                    name: nombre,
                    email: email,
                    body: body,
                    post_id: $('#formComments input[name=post_id]').val(),
                    comment_id: $('#formComments input[name=comment_id]').val()
                },
            })
            .done(function(response) {
                console.log(response);

                if (response.error == 0) {
                    alertify.notify(response.message, 'success')    
                } else {
                    alertify.notify(response.message, 'error')
                }

                

                $('#formComments textarea[name=body]').val('')
                
            })
            .fail(function() {
                console.log("error");
            })
        })


        $(document).on('click', '.comment-reply', function(e){
            e.preventDefault()

            $('.title-comment-form').html(
                            'Respondiendo al comentario de <strong>' + $(this).attr('data-name') + '</strong>'
                            + ' <a class="btn btn-default btn-xs" id="cancelarRespuesta">cancelar</a>'
                            );

            $('#formComments input[name=comment_id]').val($(this).attr('data-id'));
            $('#formComments input[name=post_id]').val(0);

            var posicion = $('.comment-form').offset().top;

            $('html, body').animate({
                scrollTop: posicion - 100
            }, 1200);
        });


        $(document).on('click', '#cancelarRespuesta', function(e){
            e.preventDefault();

            $('.title-comment-form').html('Deja tu opinión');
            $('#formComments input[name=comment_id]').val(0);
            $('#formComments input[name=post_id]').val(globalPostId);

        })
    </script>
@endpush