@extends('app')

@section('title','Home')

@section('poster')
<!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="internet-cover">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-2 pb-0">Early Black Friday <br><span>Internet Deals</span></h1>
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
          <h2>Most Popular Plans</h2>
          <!-- <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p> -->
        </div>

        <div class="row">
          @foreach($plans as $plan)
            @php(list($whole, $decimal) = explode('.', (float)$plan->price))
          <div class="col-lg-3">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">{{$plan->tagline}}</h5>
                <h6 class="card-price text-center">
                  <div class="featured-new__price-helper">
                        <div class="price price--format_english">
                          <div class="price__from">{{$plan->title}}</div>
                          <span class="price__value--dollars">{{ $whole }}</span>
                          <span class="price__group">
                            <span class="price__value--cents">.{{ $decimal }}</span>
                            <div class="price__period">monthly</div>
                          </span>
                        </div>
                  </div>
                </h6>
                
                @if(!empty($plan->detail_desctiption) && $detail_desctiption = json_decode($plan->detail_desctiption))
                    <hr>
                    @if(strtolower($plan->type) == 'internet')
                    <div class="row">
                      <div class="col-sm-6">
                        <h6 class="text-muted text-uppercase text-center"><i class="fa fa-chevron-down"></i></span> {{$detail_desctiption->downspeed}}</h6>                  
                      </div>
                      <div class="col-sm-6">
                        <h6 class="text-muted text-uppercase text-center"><i class="fa fa-chevron-up"></i></span> {{$detail_desctiption->upspeed}}</h6>
                      </div>
                    </div>
                    @endif
                @endif
                <hr>
                <div class="text-center">
                  <!--<button type="button" class="btn">Order</button>-->
                  <a href="{{route('cart.index')}}" class="btn" >Order</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
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
   
</main>
@stop

@push('js')
@endpush