<!--Main Footer-->
    <section class="main-footer">
    	<div class="inner-container">
            <!--Logo Column-->
            <div class="logo">
                {{-- <a href="index-2.html">
                    <img src="/front/images/footer-logo.png" alt="" />
                </a> --}}

                <h3>
                    <a href3="">
                        {{ strtoupper(config('app.name')) }}
                    </a>
                </h3>
            </div>
            <div class="row clearfix">
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<div class="mail-info">{{ App\Helper::infoContact() }} <br></div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                    @if ($socials->count() > 0)
                	   <ul class="social-icon-one">
                           @foreach ($socials as $social)
                    	       <li>
                                    <a target="_blank" href="{{ $social->link }}" title="{{ $social->name }}">
                                        <span class="fa {{ $social->icon }}"></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="copyright">&copy; Copyright {{ date('Y') }} {{ config('app.name') }}. All rights reserved </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--End Main Footer-->
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>

<script src="/front/js/jquery.js"></script> 
<script src="/front/js/bootstrap.min.js"></script>
<script src="/front/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/front/js/owl.js"></script>
<script src="/front/js/wow.js"></script>
<script src="/front/js/appear.js"></script>
<script src="/front/js/jquery.fancybox.js"></script>
<script src="/front/js/script.js"></script>
<script src="/js/notify.js"></script>
<script src="/adminlte/alertifyjs/alertify.min.js"></script>
<script src="/js/socket.io.js"></script>

<script>

    alertify.set('notifier','position', 'top-right');

    socket = io.connect('http://crigalnode.herokuapp.com', {
        forceNew: true,
    });

    socket.on('App\\Events\\PostCreated', function(data){
       alertify.notify('We have published a new entry! <a target="_blank" href="'+data.url+'">You can see it here</a>', 'success')
   });

        
</script>

@stack('scripts')

</body>
</html>