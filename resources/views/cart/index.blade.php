@extends('layouts.default')

@section('title','Cart')

@push('css')
    <link rel="stylesheet" href="/assets/plugins/jQuery-autoComplete/jquery.auto-complete.css">
    <link rel="stylesheet" href="/assets/plugins/jQuery-toast/dist/jquery.toast.min.css">
@endpush

@section('poster')
  <div class="vc_row-full-width vc_clearfix"></div>
  <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1552513929476 vc_row-has-fill">
      <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner">
              <div class="wpb_wrapper">
                  <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeInLeft fadeInLeft" >
                      <div class="wpb_wrapper">
                          <h3 class="service-heading" style="color: #ffffff; text-align: center;">Contactez-nous</h3>
                      </div>
                  </div>
                  <div class="vc_row wpb_row vc_inner vc_row-fluid">
                      <div class="wpb_column vc_column_container vc_col-sm-12">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeInLeft fadeInLeft" >
                                      <div class="wpb_wrapper">
                                          <p style="color: #ffffff; text-align: center;">Unbeatable Internet, TV, Home Phone & Home Security.</p>
                                          <p style="color: #ffffff; text-align: center;">Find what works best for you!</p>
                                      </div>
                                  </div>
                                  <div role="form" class="wpcf7" id="wpcf7-f3273-p456-o1" lang="en-CA" dir="ltr">
                                      <div class="screen-reader-response"></div>
                                      <div id="address-box" style="display: none;">
                                        <h3 id="selected-address" style="color: #ffffff;margin-top: 20px;"></h3>
                                        <a id="check-another-address" href="javascript::avoid;;">Check another address</a>
                                      </div>
                                      <form method="POST" action="{{route('cart.check.address.availability')}}" id="form-cart-check-address-availability" class="wpcf7-form" novalidate="novalidate">
                                          @csrf
                                          <div class="col-sm-12">
                                              <span class="wpcf7-form-control-wrap text-42 autocomplete">
                                                  <input type="text" name="check_address" id="check-address" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Example: 1003-12 Timor St., Toronto, ON" />
                                              </span>
                                          </div>
                                          <div class="col-sm-12" style="margin-top: 30px;">
                                              <input type="submit" value="Check" class="wpcf7-form-control wpcf7-submit" />
                                          </div>
                                          <div class="wpcf7-response-output wpcf7-display-none"></div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="vc_row-full-width vc_clearfix"></div>

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
                <p class="img">@if(view()->exists("svg.internet")) @include("svg.internet") @endif</p>
                <h3>Internet</h3>
                <label class="checkbox">
                  <input type="checkbox" name="selection[]" id="checkbox-internet" value="internet" />
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="col-lg-3 text-center service">
                <p class="img">@if(view()->exists("svg.tv")) @include("svg.tv") @endif</p>
                <h3>TV</h3>
                <label class="checkbox">
                  <input type="checkbox" name="selection[]" id="checkbox-tv" value="tv" />
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="col-lg-3 text-center service">
                <p class="img">@if(view()->exists("svg.home-phone")) @include("svg.home-phone") @endif</p>
                <h3>Home Phone</h3>
                <label class="checkbox">
                  <input type="checkbox" name="selection[]" id="checkbox-home_phone" value="home_phone" />
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="col-lg-3 text-center service">
                <p class="img">@if(view()->exists("svg.home-security")) @include("svg.home-security") @endif</p>
                <h3>Security</h3>
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
            <div class="col-auto wpcf7-form">
              <input type="button" id="next-btn" class="wpcf7-form-control wpcf7-submit next-btn" disabled="disabled" value="Next" />
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
        },
        minLength: 1,
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
              $( 'input[name="selection[]"]' ).attr( "disabled", true );
              $('.service').each(function(){
                  $(this).removeClass('service-checked');
              });

             } else {
              $( 'input[name="selection[]"]' ).attr( "disabled", false );

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