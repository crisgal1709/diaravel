@extends('front.layouts.layout')

@section('content')
    <section class="contact-banner-section" style="background-image:url(/front/images/pattern.jpeg)">
        <div class="auto-container">
            <h1>Contact</h1>
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
                        <h2>Thank you for contacting us</h2>
                        <div class="text">
                            I am happy to help you with any questions you may have, but I must admit that I do not always have the magic wand to make everything work ... anyway, try to be brief and tell me your story.
                        </div>
                        <ul class="list-style-one">
                            <li><span class="icon fa fa-envelope-o"></span>{{ App\Helper::infoContact() }}</li>
                            {{-- <li><span class="icon flaticon-technology-1"></span>+44 20 7240 9319</li>
                            <li><span class="icon flaticon-map-marker"></span>JL.Kemacetan timur no.23. block.Q3 <br> Jakarta-New york</li> --}}
                        </ul>
                    </div>
                </div>
                <!--Form Column-->
                <div class="form-column col-md-6 col-sm-12 col-xs-12">
                    <h2>Send Your Message</h2>
                    
                    <!-- contact Form -->
                    <div class="contact-form">
                        <!--contact Form-->
                        <form method="post" action="" id="contact-for">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" name="name" placeholder="Your name here" required>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <input type="text" name="subject" placeholder="What is your message about?" required>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                    <textarea name="message" placeholder="Your message"></textarea>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send</button>
                                </div>
                                
                            </div>
                        </form>
                            
                    </div>
                    <!--End Contact Form --> 
                    
                </div>
            </div>
        </div>
    </section>
@endsection