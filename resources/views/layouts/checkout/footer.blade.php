   <!--==========================
      Schedule Section
    ============================-->
    <section id="subscribe" class="bottom-cart-container">
      <div class="container wow">
        @php($price = isset($cart['data']['internet']['price']) ? $cart['data']['internet']['price'] : 0)
        @php(list($whole, $decimal) = explode('.', (float)$price))
          
          <div class="row">
            <div class="col-lg-9">
              <div class="row">

                    <p class="col col-auto">Due next month <br/>before tax:</p>
                    <p class="col col-auto">
                      <h6 class="card-price text-center">
                        <div class="featured-new__price-helper">
                              <div class="price price--format_english" style="color: white;">
                                $<span class="price__value--dollars">{{$whole}}</span>
                                <span class="price__group">
                                  <span class="price__value--cents">.{{$decimal}}</span>
                                  <div class="price__period">/Month</div>
                                </span>
                              </div>
                        </div>
                      </h6>
                    </p>
                
                  <span class="seprator"></span>
                
                  <p class="col">
                    Prorated first payment:
                    <b>$22.14</b> <br/>
                    One time charge:
                    <b>$0.00</b>

                  </p>
              
              </div>

             <!--  <h3>Internet Plans</h3>
              <p>Your unlimited plan: {{ $plan->title }}</p> -->
            </div>
            <div class="col-lg-3 text-right">
                <div class="form-row justify-content-center">
                  <form id="next-form" method="POST">
                    @csrf
                    <div class="col-auto">
                      <button type="submit" id="next-btn" class="next-btn" disabled="disabled">Next</button>
                    </div>
                  </form>
                </div>

            </div>
          </div>


        
      </div>

    </section>