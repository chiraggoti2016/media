
        <!--==========================
        What's included in all our plans
      ============================-->
      <section id="speakers" class="about-all-plans wow" style="padding: 60px 0 200px 0;">
        <div class="container">
          <div class="row">
            <p class="svg-75">
              @include("svg.internet")
              Choose Your Internet</p>
          </div>
          <div class="row">
            <div class="col-lg-9">
              <h3>Internet Plans</h3>
              @if(isset($plan))
                <p>Your unlimited plan: <label class="label label-primary">{{ $plan->title }}</label></p>
              @else
                <p>Select plan</p>
              @endif
            </div>
            @if(isset($plan))            
              <div class="col-lg-3 text-center change-link-container">
                  <div class="checkout-success"><i class="fa fa-check"></i></div>
                  <a href="#" id="change-plan-link">Change</a>            
              </div>
            @endif
          </div>

          
            <div class="row" id="alternate-container" style="{{ isset($plan) ? 'display: none;' : ''}}">
              @if (view()->exists('cart.alternate.' . strtolower(str_replace('_','-',$step)))) 
                @include('cart.alternate.' . strtolower(str_replace('_','-',$step)), ['alternate_plans' => $alternate_plans, 'plan' => $plan])
              @endif
            </div>

            @if(isset($plan))
              <hr/>
              @if (view()->exists('cart.addons.' . strtolower(str_replace('_','-',$step)))) 
                @include('cart.addons.' . strtolower(str_replace('_','-',$step)), ['addons' => $addons, 'plan' => $plan])
              @endif
            @endif

          
        </div>
      </section>

  @push('js')
    <script src="/assets/plugins/jQuery-toast/dist/jquery.toast.min.js"></script>
    <script type="text/javascript">
      var plan = "{{$step}}";
      var next_url = "{{route('cart.process')}}";
      $('.plan-select').click(function(e){
        $('.plan-select').each(function(){
          $(this).removeClass('select').html('Select');
        });
        $(this).addClass('select').html('Selected');
        plan = $(this).data('plan-id');
        next_url = $(this).data('next-url');
        $('#next-form').attr('action', next_url);
        $("#next-btn").attr("disabled", false);
      });

      $('#change-plan-link').click(function(){
        $(this).parent().hide();
        $('#alternate-container').show();
        // $("#next-btn").attr("disabled", false);
      });
    </script>
  @endpush


