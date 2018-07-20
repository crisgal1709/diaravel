@include('front.layouts.header')

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!--Header Span-->
    <div class="header-span"></div>
 	
    <!-- Main Header-->
    @include('front.layouts.menu')
    <!--End Main Header -->
    
    <!-- Hidden Navigation Bar -->
    {{-- @include('front.layouts.hidden-bar') --}}
    <!-- End / Hidden Bar -->
	
    @yield('content')
    
    @include('front.layouts.footer')