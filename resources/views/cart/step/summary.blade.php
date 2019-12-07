    <!--==========================
      What's included in all our plans
    ============================-->
    <section id="speakers" class="about-all-plans wow" style="padding: 60px 0 200px 0;">
      <div class="container">
        <div class="row">

        </div>
        <div class="row">
          <div class="col-lg-9">
            <h3>Summary</h3>
         
          </div>

        </div>

        <div class="row">
          <div id="cart-details">
            <hr/>
            <div class="col-auto">

              <div class="row">
                <div class="col-sm-12">
                  @foreach($cart['data'] as $plantype => $plan) 
                    <h4>{{ucwords($plantype)}}</h4>
                    <hr/>
                    <table style="width:1024px;">
                      <tr>
                        <th>Plan</th>
                        <th class="text-right">Payment</th>
                      </tr>
                      <tr>
                        <td>{{$plan->title}}</td>                
                        <td class="text-right">${{$plan->price}}</td>                
                      </tr>
                      @if(hasDiscount($plan))
                      <tr class="discount">
                        <td>Discount</td>                
                        <td class="text-right">-${{getDiscount($plan)}}</td>                
                      </tr>
                      @endif
                      <tr class="line">
                        <td rowspan="2">
                            Starts {{ date_format(now(),"M d Y") }}, ends {{ date_format(date_add(now(),date_interval_create_from_date_string("1 months")),"M d Y") }} 
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="2" class="text-right">${{getPrice($plan)}}</th>
                      </tr>
                    </table>
                    <hr/>

                    <table style="width: 100%;">
                      <tr>
                        <th colspan="2">Equipment</th>
                      </tr>

                      @if(isset($cart['addon'][$plantype]['modem']))
                          @foreach($cart['addon'][$plantype]['modem'] as $modem_id => $modem)
                            @if(in_array($modem['buying_method'], ['none', 'purchase']))
                              <tr>
                                <td>{{$modem['addon']->name}}</td>                
                                <td class="text-right">${{$modem['addon']->amount}}</td>
                              </tr>
                            @else
                              <tr>
                                <td>{{$modem['addon']->name}} (Rent)</td>                
                                <td class="text-right">${{$modem['addon']->rent_amount}}</td>
                              </tr>
                              <tr>
                                <td>{{$modem['addon']->name}} (Deposite)</td>                
                                <td class="text-right">${{$modem['addon']->deposit}}</td>
                              </tr>
                            @endif
                          @endforeach 
                      @endif

                      @if(isset($cart['addon'][$plantype]['other']))
                          @foreach($cart['addon'][$plantype]['other'] as $other_id => $other)
                            <tr>
                              <td>{{$other['addon']->name}}</td>                
                              <td class="text-right">${{$other['addon']->amount}}</td>
                            </tr>
                          @endforeach 
                      @endif
                      <tr>
                        <th></th>
                        <th rowspan="2" class="text-right">${{$plan->addon_total}}</th>
                      </tr>
                    </table>
                  @endforeach
  
                  @if(isset($cart['installation']['charge']))
                      <hr/>
                      <table style="width: 100%;">
                        <tr>
                          <th colspan="2">Installation</th>
                        </tr>
                        <tr>
                          <td>Setup Charge</td>
                          <td class="text-right">${{$cart['installation']['charge']}}</td>
                        </tr>
                      </table>
                  @endif                  
                    <hr/>
                    <h4>Other</h4>
                    <hr/>
                    <table style="width:1024px;">
                      <tr>
                        <th>Shipping</th>
                        <th class="text-right">${{$cart['summary']['shipping']}}</th>
                      </tr>
                    </table>

                    <hr/>
                    <h4>Total</h4>
                    <hr/>
                    <table style="width:1024px;">
                      <tr>
                        <th>Sub Total</th>
                        <td class="text-right">${{$cart['summary']['total']}}</td>
                      </tr>
                      <tr>
                        <th>Tax</th>
                        <td class="text-right">${{$cart['summary']['tax']}}</td>
                      </tr>
                      <tr>
                        <th>Total</th>
                        <th class="text-right">${{$cart['summary']['grand_total']}}</th>
                      </tr>
                    </table>
               </div>

              </div>
            </div>
            <hr/>
          </div>

        </div>


      </div>
    </section>
