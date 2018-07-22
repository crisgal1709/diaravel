<div class="comments-area">
    <div class="group-title"><h2>{{ $post->present()->comments() }}</h2></div>
    
    <!--Comment Box-->
    @foreach ($post->comments as $comment)
        <div class="comment-box" id="comment-{{ $comment->id }}">
            <div class="comment">
                <div class="author-thumb">
                    <img src="/front/images/resource/author-1.jpg" alt="">
                </div>

                <div class="comment-inner">
                    <div class="comment-info clearfix"><strong>{{ $comment->present()->authorName() }}</strong>
                        <div class="comment-time">
                            {{ $comment->present()->getPublishedDate() }}
                        </div>
                    </div>

                    <div class="text">
                        {{ $comment->body }}   
                    </div>

                    <a class="comment-reply" href="#" id="reply-{{ $comment->id }}" data-id="{{ $comment->id }}"  data-name="{{ $comment->name }}">
                        <span class="icon fa fa-mail-reply"></span> Responder
                    </a>
                </div>
            </div>
        </div>
        
        @if ($comment->responses->count() > 0)
            @foreach ($comment->responses as $response)
                <!--Comment Box-->
                <div class="comment-box" style="margin-left: 70px" id="response-{{ $response->id }}">
                    <div class="comment">
                        <div class="author-thumb">
                            <img src="/front/images/resource/author-2.jpg" alt="">
                        </div>

                        <div class="comment-inner">
                            <div class="comment-info clearfix"><strong>{{ $response->present()->authorName() }}</strong>
                                <div class="comment-time">
                                    {{ $response->present()->getPublishedDate() }}
                                </div>
                            </div>

                            <div class="text">
                                {{ $response->body }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    @endforeach
    
    
    
</div>