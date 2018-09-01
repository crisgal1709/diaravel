<div class="comment-form">
    <div class="group-title">
        <h2 class="title-comment-form">Leave your opinion</h2>
    </div>
    <!--Comment Form-->
    <form id="formComments" method="POST" action="{{ route('frontend.storeComment') }}">
        @csrf()
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="comment_id" value="0">
        <div class="row clearfix">

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                <input type="text" name="name" placeholder="Name">
            </div>
            
            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                <input type="email" name="email" placeholder="Email">
            </div>
            
            {{-- <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                <input type="text" name="subject" placeholder="Subject">
            </div> --}}
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                <textarea name="body" placeholder="Comment" id="body"></textarea>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                <button class="theme-btn btn-style-one" type="submit" name="submit-form" disabled="disabled">Send</button>
            </div>
            
        </div>
    </form>
    
</div>

