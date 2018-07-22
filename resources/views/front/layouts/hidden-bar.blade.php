<section class="hidden-bar right-align">
        
        <div class="hidden-bar-closer">
            <button><span class="flaticon-remove"></span></button>
        </div>
        
        <!-- Hidden Bar Wrapper -->
        <div class="hidden-bar-wrapper">
            
            <div class="logo">
            	{{-- <a href="index-2.html"><img src="/front/images/logo-2.png" alt="" /></a> --}}

                <a href="{{ url('') }}" style="color: white; font-size: 30px; font-weight: 600">
                    {{ strtoupper(config('app.name')) }}
                </a>
            </div>
            <div class="content-box">
            	<h2></h2>
                <form method="GET" action="{{ route('frontend.search') }}">
                    <div class="form-group" style="width: 100%; ">
                        <input type="search" class="form-control" name="s" value="" placeholder="Buscar" required style="padding: 10px; width: 100%">
                    </div>
                    <button href="#" class="theme-btn btn-style-two">Buscar</button>
                </form>
                
            </div>
            <div class="contact-info">
            	{{-- <h2>Contact Info</h2>
                <ul class="list-style-two">
                	<li><span class="icon fa fa-map-marker"></span>Rock St 12, Newyork City, USA</li>
                    <li><span class="icon fa fa-phone"></span>(526) 236-895-4732</li>
                    <li><span class="icon fa fa-envelope-o"></span>creationdreamt@gmail.com</li>
                    <li><span class="icon fa fa-clock-o"></span>Week Days: 09.00 to 18.00 Sunday: Closed</li>
                </ul> --}}
            </div>
        </div><!-- / Hidden Bar Wrapper -->
        
    </section>