<header class="main-header">
        
        <!-- Main Box -->
    	<div class="main-box">
            <div class="outer-container clearfix">
                <!--Logo Box-->
                <div class="logo-box">
                    <div class="logo">
                        {{-- <a href="index-2.html"><img src="/front/images/logo.png" alt=""></a> --}}
                        <h1>
                            <a href="#">{{ strtoupper(config('app.name')) }}</a>
                        </h1>
                    </div>
                </div>
                
                <!--Nav Outer-->
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="dropdown"><a href="{{ url('') }}">Inicio</a>
                                </li>
                                <li><a href="{{ url('') }}">Acerca de</a></li>
                                <li class="dropdown"><a href="{{ url('') }}">Blog</a>
                                </li>
                               	<li><a href="{{ route('frontend.contact') }}">Contacto</a></li>
                             </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                    
                    <!--Btn Outer-->
                    <div class="btn-outer">
                        <!-- Hidden Nav Toggler -->
                        <div class="nav-toggler">
                            <button class="hidden-bar-opener"><span class="icon flaticon-menu"></span></button>
                        </div>
                        <!-- / Hidden Nav Toggler -->
                    </div>
                    
                </div>
                <!--Nav Outer End-->
                
            </div>
        </div>
    
    </header>