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
                <p class="col-auto">Due next month <br/>
                before tax:</p>
                <p class="col-auto">
                  <h6 class="card-price text-center">
                    <div class="featured-new__price-helper">
                          <div class="price price--format_english">
                            <span class="price__value--dollars" style="color:white;">{{$whole}}</span>
                            <span class="price__group">
                              <span class="price__value--cents"  style="color:white;">.{{$decimal}}</span>
                              <div class="price__period"  style="color:white;">/Month</div>
                            </span>
                          </div>
                    </div>
                  </h6>

                </p>

              </div>

             <!--  <h3>Internet Plans</h3>
              <p>Your unlimited plan: {{ $plan->title }}</p> -->
            </div>
            <div class="col-lg-3 text-right">
                <div class="form-row justify-content-center">
                  <div class="col-auto">
                    <button type="button" id="next-btn" class="next-btn" disabled="disabled">Next</button>
                  </div>
                </div>

            </div>
          </div>


        
      </div>

    </section>