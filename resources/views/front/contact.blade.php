@extends('front.layouts.layout')

@section('content')
    <section class="contact-banner-section" style="background-image:url(/front/images/pattern.jpeg)">
        <div class="auto-container">
            <h1>Contacto</h1>
        </div>
    </section>
    <!--End Contact Banner Section-->
    
    <!--Contact Section-->
    <section class="contact-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Info Column-->
                <div class="info-column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <h2>Gracias por tu interés Esta sección está en construcción</h2>
                        <div class="text">
                            Estoy encantado de ayudarte en cualquier duda que tengas, pero debo reconocer que no siempre tengo la varita mágica para hacer todo funcionar... de todos modos, trata de ser breve y cuéntame tu historia.
                        </div>
                        <ul class="list-style-one">
                            <li><span class="icon fa fa-envelope-o"></span>info@diaravel.com </li>
                            {{-- <li><span class="icon flaticon-technology-1"></span>+44 20 7240 9319</li>
                            <li><span class="icon flaticon-map-marker"></span>JL.Kemacetan timur no.23. block.Q3 <br> Jakarta-New york</li> --}}
                        </ul>
                    </div>
                </div>
                <!--Form Column-->
               {{--  <div class="form-column col-md-6 col-sm-12 col-xs-12">
                    <h2>Send Your Message</h2>
                    
                    <!-- contact Form -->
                    <div class="contact-form">
                        <!--contact Form-->
                        <form method="post" action="" id="contact-for">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" name="name" placeholder="Tu nombre aquí" required>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="email" name="email" placeholder="Correo" required>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <input type="text" name="subject" placeholder="¿De qué trata tu mensaje?" required>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                    <textarea name="message" placeholder="Escribe lo que necesites"></textarea>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Enviar</button>
                                </div>
                                
                            </div>
                        </form>
                            
                    </div>
                    <!--End Contact Form --> 
                    
                </div> --}}
            </div>
        </div>
    </section>
@endsection