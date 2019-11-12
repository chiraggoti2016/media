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
            <p>Your unlimited plan: <label class="label label-primary">{{ $plan->title }}</label></p>
          </div>
          <div class="col-lg-3 text-center">
              <div class="checkout-success"><i class="fa fa-check"></i></div>
              <a href="#" id="change-plan-link">Change</a>            
          </div>
        </div>
        
        <div class="row" id="alternate-container" style="display: none;">
          @if (view()->exists('cart.alternate.' . strtolower(str_replace('_','-',$plan->type)))) 
            @include('cart.alternate.' . strtolower(str_replace('_','-',$plan->type)), ['alternate_plans' => $alternate_plans, 'plan' => $plan])
          @endif
        </div>
      </div>
    </section>
