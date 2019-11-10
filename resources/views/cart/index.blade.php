@extends('app')

@section('title','Cart')

@push('css')
    <link rel="stylesheet" href="/assets/plugins/jQuery-autoComplete/jquery.auto-complete.css">
@endpush

@section('poster')
<!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="cart-cover" style="height: 12vh;">
    <div class="intro-container wow fadeIn">
      <!--<h1 class="mb-4 pb-0">Unbeatable Internet, TV, <br/>Home Phone & Home Security</h1>-->
      <!--<a href="#about" class="about-btn scrollto">Shop Online</a>-->
    </div>
  </section>
  
      <!--==========================
      Subscribe Section
    ============================-->
    <section id="subscribe" >
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Unbeatable Internet, TV, Home Phone & Home Security</h2>
          <p>Find what works best for you</p>
        </div>

        <form method="POST" action="#">
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Example: 1003-12 Timor St., Toronto, ON">
            </div>
            <div class="col-auto">
              <button type="submit">Check</button>
            </div>
          </div>
        </form>

      </div>
    </section>

@stop

@section('content')
<main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>CALL +1-855-333-8269</h2>
            <p>TO SIGN UP OR ORDER ONLINE</p>
          </div>
        </div>
      </div>
    </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Nihil officia ut sint molestiae tenetur.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>
@stop

@push('js')
  
  <script src="/assets/plugins/jQuery-autoComplete/jquery.auto-complete.js"></script>

@endpush