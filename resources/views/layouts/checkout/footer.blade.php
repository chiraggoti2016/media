   <!--==========================
      Schedule Section
    ============================-->
    <section id="subscribe" class="bottom-cart-container">
      <div class="container wow">
          @php($total = splitAmount($cart['planamounts']))
          
          <div class="row">
            <div class="col-lg-9">
              <div class="row">

                    <p class="col col-auto">Due next month <br/>before tax:</p>
                    <p class="col col-auto">
                      <h6 class="card-price text-center">
                        <div class="featured-new__price-helper">
                              <div class="price price--format_english" style="color: white;">
                                $<span class="price__value--dollars">{{$total['whole']}}</span>
                                <span class="price__group">
                                  <span class="price__value--cents">.{{$total['decimal']}}</span>
                                  <div class="price__period">/Month</div>
                                </span>
                              </div>
                        </div>
                      </h6>
                    </p>
                
                  <span class="seprator"></span>
                
                  <p class="col">
                    Prorated first payment:
                    <b>${{$cart['summary']['grand_total']}}</b> <br/>
                    One time charge:
                    <b>${{$cart['summary']['one_time']}}</b>

                  </p>

                  <p class="col footer-cart-link" >
                    <a href="#" id="see-cart-details">See details</a>
                    <br/>
                    <a href="{{route('cart.index')}}">Change address or add other services</a>

                  </p>
              
              </div>

            </div>
            <div class="col-lg-3 text-right">
                <div class="form-row justify-content-center" id="next-form-container" >
                  @if($step == 'payment')
                      <div class="next-form-input-container"></div>
                      <div class="col-auto">
                        <button type="button" id="footer-submit-btn" class="footer-submit-btn" >Submit</button>
                      </div>
                  @else
                    <form id="next-form" method="POST" action="{{$next_url}}">
                      @csrf
                      <div class="next-form-input-container"></div>
                      <div class="col-auto">
                        <button type="submit" id="next-btn" class="next-btn" {{(!$process_done)?'disabled="disabled"':''}}>{{($step == 'payment')?'Submit':'Next'}}</button>
                      </div>
                    </form>
                  @endif
                  
                </div>

            </div>
          </div>
          <div id="cart-details" style="display: none;">
            <hr/>
            <div class="col-auto">
              <h3>Shopping Cart</h3> 

              <div class="row">
                <div class="col-sm-6">
                  @foreach($cart['data'] as $plantype => $plan) 
                  
                    @if(!in_array($plantype, config('plantypes.list'))) 
                      @continue
                    @endif
                    <h4>{{ucwords( str_replace('_',' ', $plantype) )}}</h4>
                    <table>
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

                    <table>
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
                  
                  


                </div>

                @if(isset($cart['installation']['charge']))
                <div class="col-sm-6">
                  <h4>Installation</h4>
                  <table>
                    <tr>
                      <td>Setup Charge</td>
                      <td class="text-right">${{$cart['installation']['charge']}}</td>
                    </tr>
                  </table>
                </div>
                @endif

                @if(isset($cart['summary']['shipping']))
              
                  <table>
                    <tr>
                      <td>Shipping</td>
                      <th class="text-right">${{$cart['summary']['shipping']}}</th>
                    </tr>

                    <tr>
                      <td>Total</td>
                      <th class="text-right">${{$cart['summary']['total']}}</th>
                    </tr>

                    <tr>
                      <td>Tax</td>
                      <th class="text-right">${{$cart['summary']['tax']}}</th>
                    </tr>
                  </table>
                
                @endif

              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-sm-6 text-left">
                <div class="close-button" style="display: none;">
                    <button type="button" id="close-cart-details">
                        × <span class="shopping-cart__btn-close-label">Close</span>
                    </button>
                </div>
              </div>            
              <div class="col-sm-6 text-right">
                <h3>Grand Total: <b>${{$cart['summary']['grand_total']}}</b></h3> 
              </div>
            </div>
          </div>


        
      </div>

    </section>

@push('js')

  <script type="text/javascript">

    $('#see-cart-details').click(function(e){
      $(this).hide();
      $('#next-form-container').hide();
      $('#close-cart-details').parent().show();
      $('#cart-details').show();
    });

    $('#close-cart-details').click(function(){
      $('#cart-details').hide();
      $(this).parent().hide();
      $('#see-cart-details').show();
      $('#next-form-container').show();
    });
  </script>
    @endpush