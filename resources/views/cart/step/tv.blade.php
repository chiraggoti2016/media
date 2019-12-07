@if(isset($plan))
        <!--==========================
        What's included in all our plans
      ============================-->
      <section id="speakers" class="about-all-plans wow" style="padding: 60px 0 200px 0;">
        <div class="container">
          <div class="row">
            <p class="svg-75">
              @include("svg.tv")
              Choose Your Tv</p>
          </div>
          <div class="row">
            <div class="col-lg-9">
              <h3>Tv Plans</h3>
              <p>Your plan: <label class="label label-primary">{{ $plan->title }}</label></p>
            </div>
          </div>

          @if(isset($cart['data']['tv'])) 
            <div class="row" id="alternate-container" >
              @if (view()->exists('cart.alternate.' . strtolower(str_replace('_','-',$plan->type)))) 
                @include('cart.alternate.' . strtolower(str_replace('_','-',$plan->type)), ['alternate_plans' => $alternate_plans, 'plan' => $plan])
              @endif
            </div>

              @if (view()->exists('cart.addons.' . strtolower(str_replace('_','-',$plan->type)))) 
                @include('cart.addons.' . strtolower(str_replace('_','-',$plan->type)), ['addons' => $addons, 'plan' => $plan])
              @endif

          @endif
        </div>
      </section>

  @push('js')
    <script src="/assets/plugins/jQuery-toast/dist/jquery.toast.min.js"></script>
    <script type="text/javascript">
      var plan = "{{$plan->type}}";
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

@endif
