@extends('layouts.master')

@section('title','Cart')

@push('css')
    <link rel="stylesheet" href="/assets/plugins/jQuery-autoComplete/jquery.auto-complete.css">
    <link rel="stylesheet" href="/assets/plugins/jQuery-toast/dist/jquery.toast.min.css">
    
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
        <div class="section-header text-center">
          <h2>Unbeatable Internet, TV, Home Phone & Home Security</h2>
          <p>Find what works best for you</p>
          <div id="address-box" style="display: none;">
            <h3 id="selected-address" style="color: #ffffff;margin-top: 20px;"></h3>
            <a id="check-another-address" href="javascript::avoid;;">Check another address</a>
          </div>
        </div>

        <form method="POST" action="{{route('cart.check.address.availability')}}" id="form-cart-check-address-availability">
          @csrf
          <div class="form-row justify-content-center">
            <div class="col-auto autocomplete">
              <input type="text" name="check_address" id="check-address" class="form-control" placeholder="Example: 1003-12 Timor St., Toronto, ON">
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
      What's included in all our plans
    ============================-->
    <section id="speakers" class="about-all-plans wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>What's included in all our plans</h2>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <h3>No term contracts</h3>
            <p>No cancellation fees. Upgrade, downgrade, or cancel service at any time.</p>
          </div>
          <div class="col-lg-3">
            <h3>Unlimited usage</h3>
            <p>No caps or download tiers. Get the most out of your internet connection.</p>
          </div>
          <div class="col-lg-3">
            <h3>Save money</h3>
            <p>Low, low prices for unlimited Internet, TV and Home Phone. Why pay more?</p>
          </div>
          <div class="col-lg-3">
            <h3>Great service</h3>
            <p>Our customers always come first. Have a problem? We are here to help.</p>
          </div>
        </div>
      </div>
    </section>

  <!--==========================
      What's included in all our plans
    ============================-->
    <form method="POST" action="{{route('cart.process')}}" id="next-form">
      @csrf

      <section id="speakers" class="select-your-service wow" style="display: none;padding-bottom: 200px;">
        <div class="container">
          <div class="section-header">
            <h2>Select your services</h2>
          </div>
          <div class="row">
              <div class="col-lg-3 text-center service">
                <p class="img"><svg class="checkout-start-services__item-icon" width="100px" height="100px" viewBox="0 0 367 255" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="internet_icon_blue" fill="#f82249">
                                        <g id="Layer_1">
                                            <g id="Group">
                                                <rect id="Rectangle-path" x="60.4" y="152.7" width="247.2" height="14.1"></rect>
                                                <rect id="Rectangle-path" x="148.8" y="216" width="70.7" height="14.1"></rect>
                                                <path d="M318,191.5 L50,191.5 C42.4,191.5 35.9,185.1 35.9,177.4 L35.9,15 C35.9,7.3 42.3,0.9 50,0.9 L318.4,0.9 C326,0.9 332.5,7.3 332.5,15 L332.5,177.5 C332.4,185.1 326,191.5 318,191.5 L318,191.5 Z M50,15 L50,177.5 L318.4,177.5 L318.4,15 L50,15 L50,15 Z" id="Shape"></path>
                                                <path d="M353.5,254.9 L14.5,254.9 C4.1,254.9 0.4,249.7 0.4,245.4 C0.4,244.2 0.7,243 1.3,242 L36.5,179.9 L48.7,186.9 L17.8,240.8 L349.5,240.8 L318.6,186.9 L330.8,179.9 L366,242 C366.6,242.9 366.9,244.1 366.9,245.4 C367.6,249.7 363.9,254.9 353.5,254.9 L353.5,254.9 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg></p>
                <h3>Internet</h3>
                <label class="checkbox">
                  <input type="checkbox" name="selection[]" id="checkbox-internet" value="internet" />
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="col-lg-3 text-center service">
                <p class="img"><svg class="checkout-start-services__item-icon" width="100px" height="100px" viewBox="0 0 368 254" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="tv_icon_blue" fill="#f82249">
                                        <g id="Layer_1">
                                            <g id="Group">
                                                <rect id="Rectangle-path" x="24.7" y="186.6" width="317.6" height="13.9"></rect>
                                                <path d="M197.4,253.5 L169.2,253.5 C165.1,253.5 162.1,250.4 162.1,246.4 L162.1,218.2 C162.1,214.1 165.2,211.1 169.2,211.1 L197.4,211.1 C201.5,211.1 204.5,214.2 204.5,218.2 L204.5,246.4 C204.6,250.8 201.5,253.5 197.4,253.5 L197.4,253.5 Z M176.4,239.6 L190.3,239.6 L190.3,225.7 L176.4,225.7 L176.4,239.6 L176.4,239.6 Z" id="Shape"></path>
                                                <rect id="Rectangle-path" x="77.8" y="239.6" width="211.8" height="13.9"></rect>
                                                <path d="M353.2,225.7 L14.2,225.7 C6.7,225.7 0.3,219.2 0.3,211.8 L0.3,14.2 C0.3,6.4 6.8,0.3 14.2,0.3 L353.2,0.3 C361,0.3 367.1,6.8 367.1,14.2 L367.1,211.7 C367.1,219.2 360.6,225.7 353.2,225.7 L353.2,225.7 Z M13.8,13.8 L13.8,211.3 L352.8,211.3 L352.8,13.8 L13.8,13.8 L13.8,13.8 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg></p>
                <h3>TV</h3>
                <label class="checkbox">
                  <input type="checkbox" name="selection[]" id="checkbox-tv" value="tv" />
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="col-lg-3 text-center service">
                <p class="img"><svg class="checkout-start-services__item-icon" width="100px" height="100px" viewBox="0 0 205 328" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="phone_icon_blue" fill="#f82249">
                                        <g id="Layer_1">
                                            <g id="Group">
                                                <rect id="Rectangle-path" x="78.2" y="226" width="49.6" height="14.1"></rect>
                                                <rect id="Rectangle-path" x="78.2" y="204" width="49.6" height="14.1"></rect>
                                                <rect id="Rectangle-path" x="78.2" y="181.9" width="49.6" height="14.1"></rect>
                                                <rect id="Rectangle-path" x="78.2" y="53.1" width="49.6" height="14.1"></rect>
                                                <path d="M138.2,275.6 L67.8,275.6 C60.2,275.6 53.7,269.2 53.7,261.5 L53.7,35.4 C53.7,15.8 69.6,0.2 88.9,0.2 L117.1,0.2 C136.7,0.2 152.3,16.1 152.3,35.4 L152.3,261.2 C152.6,269.1 146.1,275.6 138.2,275.6 L138.2,275.6 Z M88.9,14.2 C77.3,14.2 67.8,23.7 67.8,35.3 L67.8,261.1 L138.5,261.1 L138.5,35.4 C138.5,23.8 129,14.3 117.4,14.3 L88.9,14.2 L88.9,14.2 L88.9,14.2 Z" id="Shape"></path>
                                                <path d="M170,327.6 L36,327.6 C16.4,327.6 0.8,311.7 0.8,292.4 L0.8,200.6 C0.8,165.7 29.3,137 64.4,137 L64.4,151 C37.2,151 14.8,173 14.8,200.6 L14.8,292.4 C14.8,304 24.3,313.5 35.9,313.5 L169.9,313.5 C181.5,313.5 191,304 191,292.4 L191,200.6 C191,173.4 169,151 141.4,151 L141.4,137 C176.3,137 205,165.5 205,200.6 L205,292.4 C205.5,312 189.6,327.6 170,327.6 L170,327.6 Z" id="Shape"></path>
                                                <path d="M103,174.3 C89.2,174.3 78.2,163.3 78.2,149.5 C78.2,135.7 89.2,124.7 103,124.7 C116.8,124.7 127.8,135.7 127.8,149.5 C127.8,163.3 116.8,174.3 103,174.3 L103,174.3 Z M103,138.8 C97.2,138.8 92.3,143.7 92.3,149.5 C92.3,155.3 97.2,160.2 103,160.2 C108.8,160.2 113.7,155.3 113.7,149.5 C113.7,143.7 108.8,138.8 103,138.8 L103,138.8 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg></p>
                <h3>Home Phone</h3>
                <label class="checkbox">
                  <input type="checkbox" name="selection[]" id="checkbox-home_phone" value="home_phone" />
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="col-lg-3 text-center service">
                <p class="img"><svg class="checkout-start-services__item-icon" width="100px" height="100px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="phone_icon_blue" fill="#f82249">
                                        <g id="Layer_1">
                                            <g id="Group">
                                                <path class="st0" d="M251,173.8l-100,59.7l10.1,16.8l23.3-13.9v83.7c0,10.7,8.7,19.3,19.3,19.3h104.8c10.7,0,19.3-8.7,19.3-19.3v-83.7l23.3,13.9l10.1-16.8l-100-59.7C257.9,172,254.1,172,251,173.8z M308.3,224.9h-0.2l0.3,95l-104.5,0.3v-95.3h-0.2l52.3-31.3L308.3,224.9z"></path>
                                                <path class="st0" d="M431,89.2c-114.2,0-155.7-39.4-160.8-44.8c-2.8-5-8-8.2-14.2-8.4c-5.8,0-11.2,3.2-14.1,8.2c-4.4,4.8-45.3,44.9-160.8,44.9c-8.9,0-16.2,7.2-16.2,16.2V291c0,111.6,113.8,162.3,181.6,182.6c1.7,0.5,2.8,0.8,3,0.9c2.1,0.9,4.2,1.4,6.7,1.4c2.4,0,4.6-0.5,6.2-1.2c0.6-0.2,1.7-0.6,3.4-1c67.8-20.3,181.6-71,181.6-182.6V105.4C447.2,96.5,439.9,89.2,431,89.2z M427.6,291c0,98.9-105,145.1-167.6,163.8c-1.9,0.6-3.1,0.9-4,1.2c-0.9-0.3-2.1-0.7-4-1.2C189.4,436.1,84.4,389.9,84.4,291V108.8c108-0.7,157.8-36.3,171.3-51.1c12,13.6,62.4,50.4,171.9,51.1V291z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg></p>
                <h3>Home Security</h3>
                <label class="checkbox">
                  <input type="checkbox" name="selection[]" id="checkbox-home_security" value="home_security" />
                  <span class="checkmark"></span>
                </label>
              </div>
          </div>
        </div>
      </section>
    </form>

        <!--==========================
      Schedule Section
    ============================-->
    <section id="subscribe" class="bottom-cart-container" style="display: none;">
      <div class="container wow fadeInUp">

          <div class="form-row justify-content-center">
            <div class="col-auto">
              <button type="button" id="next-btn" class="next-btn" disabled="disabled">Next</button>
            </div>
          </div>
        
      </div>

    </section>


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

</main>
@stop

@push('js')
  <script src="/assets/plugins/jQuery-autoComplete/jquery.auto-complete.js"></script>
  <script src="/assets/plugins/jQuery-toast/dist/jquery.toast.min.js"></script>

  <script type="text/javascript">
    var xhr;
    $('input[name="check_address"]').autoComplete({
        source: function(term, response){
            try { xhr.abort(); } catch(e){}
            xhr = $.getJSON('{{route("cart.sugguest.address")}}', { q: term }, function(data){ response(data); });
        }
    });
    

    $('#form-cart-check-address-availability').submit(function(e){
      e.preventDefault(); 
      var form = $(this);
      var url = form.attr('action');

      $.ajax({
         type: "POST",
         url: url,
         data: form.serialize(),
         success: function(data)
         {
             $('#selected-address').html(data.selected_address);
             $(form).hide();
             $('#address-box').show();

             if(!data.availability) {
               $.toast({
                heading: 'Error',
                text: 'some selected services not available for your region.',
                showHideTransition: 'fade',
                icon: 'error'
               });
              $( 'input[name="selection[]"]' ).prop( "checked", false );

              $('.service').each(function(){
                  $(this).removeClass('service-checked');
              });

             } else {
              for(i in data.checkedable ) {
                $('#checkbox-' + data.checkedable[i]).prop( "checked", true );
                $('#checkbox-' + data.checkedable[i]).parents('.service').addClass('service-checked');
              }
             }
              $('.about-all-plans').fadeOut();
              $('#about').fadeOut();
              $('#footer').fadeOut();
              $('.select-your-service').fadeIn();
              $('.bottom-cart-container').fadeIn();
              disabledNextButton();
         }
       });
    });

    $('#check-another-address').click(function(e){
      $('.about-all-plans').fadeIn();
      $('#about').fadeIn();
      $('#footer').fadeIn();
      $('.select-your-service').fadeOut();
      $('.bottom-cart-container').fadeOut();
      $("#check-address").val('').focus();
      $('#selected-address').html('');
      $('#form-cart-check-address-availability').show();
      $('#address-box').hide();
      
    });

    $('input[type=checkbox]').change(function() {
        disabledNextButton();
        if($(this).is(":checked")) {
          $(this).parents('.service').addClass('service-checked');
        } else {
          $(this).parents('.service').removeClass('service-checked');
        }
    });

    $('#next-btn').click(function(e){
      $('#next-form').submit();
    });

    function disabledNextButton() {
      if ($("#next-form input:checkbox:checked").length > 0){
        $("#next-btn").attr("disabled", false);
      } else {
        $("#next-btn").attr("disabled", true);
      }
    }
  </script>
@endpush