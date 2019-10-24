@extends('app')

@section('title','Home')

@section('poster')
<!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">We Love Our Customers, <br><span>Our Customer Love</span> Back</h1>
      <a href="#about" class="about-btn scrollto">Shop Online</a>
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
      Shop Online Section
    ============================-->
    <section id="buy-tickets" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>Plans</h2>
          <!-- <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p> -->
        </div>

        <div class="row">
          <div class="col-lg-3">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Internet</h5>
                <h6 class="card-price text-center">
                	<div class="featured-new__price-helper">
                        <div class="price price--format_english">
							<div class="price__from">From</div>
							<span class="price__value--dollars">24</span>
							<span class="price__group">
								<span class="price__value--cents">.95</span>
								<div class="price__period">/Month</div>
							</span>
						</div>
	                </div>
                </h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>DSL or Cable</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited usage</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 300 Mbps</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">See Plans</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Tv</h5>
                <h6 class="card-price text-center">
                	<div class="featured-new__price-helper">
                        <div class="price price--format_english">
							<div class="price__from">From</div>
							<span class="price__value--dollars">24</span>
							<span class="price__group">
								<span class="price__value--cents">.95</span>
								<div class="price__period">/Month</div>
							</span>
						</div>
	                </div>
                </h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>DSL or Cable</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited usage</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 300 Mbps</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">See Plans</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Home Phone</h5>
                <h6 class="card-price text-center">
                	<div class="featured-new__price-helper">
                        <div class="price price--format_english">
							<div class="price__from">From</div>
							<span class="price__value--dollars">24</span>
							<span class="price__group">
								<span class="price__value--cents">.95</span>
								<div class="price__period">/Month</div>
							</span>
						</div>
	                </div>
                </h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>DSL or Cable</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited usage</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 300 Mbps</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">See Plans</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Home Security</h5>
                <h6 class="card-price text-center">
                	<div class="featured-new__price-helper">
                        <div class="price price--format_english">
							<div class="price__from">From</div>
							<span class="price__value--dollars">12</span>
							<span class="price__group">
								<span class="price__value--cents">.95</span>
								<div class="price__period">/Month</div>
							</span>
						</div>
	                </div>
                </h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>DSL or Cable</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited usage</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 300 Mbps</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">See Plans</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Modal Order Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Buy Tickets</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="#">
                <div class="form-group">
                  <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <select id="ticket-type" name="ticket-type" class="form-control" >
                    <option value="">-- Select Your Ticket Type --</option>
                    <option value="standard-access">Standard Access</option>
                    <option value="pro-access">Pro Access</option>
                    <option value="premium-access">Premium Access</option>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn">Buy Now</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

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
@endpush