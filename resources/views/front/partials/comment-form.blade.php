<div class="comment-form">
    <div class="group-title"><h2>Deja tu opinión</h2></div>
    <!--Comment Form-->
    <form method="post" action="{{ route('frontend.storeComment') }}">
        @csrf()
        <input type="text" name="post_id" value="{{ $post->id }}">
        <input type="text" name="comment_id" value="0">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                <input type="text" name="name" placeholder="Nombre" required>
            </div>
            
            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            
            {{-- <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                <input type="text" name="subject" placeholder="Subject" required>
            </div> --}}
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                <textarea name="body" placeholder="Comentario"></textarea>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                <button class="theme-btn btn-style-one" type="submit" name="submit-form">Enviar</button>
            </div>
            
        </div>
    </form>
    
</div>