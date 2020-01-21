
    <!--==========================
      What's included in all our plans
    ============================-->
    <section id="speakers" class="about-all-plans wow" style="padding: 60px 0 200px 0;">
      <div class="container">
        <div class="row">

        </div>
        <div class="row">
          <div class="col-lg-9">
            <h3>Internet Installation</h3>
            <p>Do you have phone line? Dry Loop <span class="label label-primary">Free</span></p>
          </div>

        </div>

        @php $installation_charge = setting('site.internet_installation_charge'); @endphp
        <div class="row">
          <div class="col-lg-8">
            <h4>Installation required</h4>
            @if(isset($cart['installation']['charge']))
              <p><span class="label label-primary">${{$installation_charge}}, INSTALLATION IS REQUIRED</span></p>
            @else
              <p>A technician will activate or install your service</p>
            @endif
          </div>

          @php $price = splitAmount($installation_charge); @endphp
          <div class="col-lg-4 text-center change-link-container">
            <div class="row">
              <div class="col-sm-6 text-right">
                <h6 class="card-price new-price">
                    <div class="featured-new__price-helper card-price-black">
                          <div class="price price--format_english ">
                            $<span class="price__value--dollars">{{$price['whole']}}</span>
                            <span class="price__group">
                              <span class="price__value--cents">.{{$price['decimal']}}</span>
                              <div class="price__period"></div>
                            </span>
                          </div>
                    </div>
                </h6>
              </div>
              <div class="col-sm-6 text-center">
                  @if(isset($cart['installation']['charge']))
                      <div class="checkout-success"><i class="fa fa-check"></i></div>          
                      <a href="{{route('cart.remove.installation.charge')}}">Change</a>
                  @else  
                    <a href="{{route('cart.add.installation.charge',setting('site.internet_installation_charge'))}}" class="select-btn select">Confirm</a>
                  @endif
              </div>
            </div>
          </div>
        </div>
        
        @if(isset($cart['installation']['charge']))
          @if(isset($cart['installation']['data']))

            <div class="row">
              <div class="col-lg-8">
                <h4>Installation Schedule</h4>
                <p><span class="label label-primary">Installation Schedule</span></p>
              </div>

                <div class="col-lg-4 text-center change-link-container">
                  <div class="row">
                    <div class="col-sm-6 text-right"></div>
                    <div class="col-sm-6 text-center">
                      <div class="checkout-success"><i class="fa fa-check"></i></div>          
                      <a href="{{route('cart.reset.installation.data')}}">Change</a>
                    </div>                    
                  </div>

                </div>
              </div>
            </div>

          @else

            <form action="{{route('cart.submit.installation.data')}}" method="POST">
              @csrf
              <div class="row">
                <h3>Installation Schedule</h3>


                  <p>Please select a day and a time slot for your installation. Note that this is a requested Installation date and not a confirmed date. We will confirm your installation date by email once it is finalized. Should your preferred date not be available, we will work with you to reschedule your installation.</p>

                  <div class="text-center">
                    @foreach([1,2,3] as $daynum)
                    <div class="row mb-2">
                      <div class="col-sm-4">
                        <label class="label">Install Date #{{$daynum}}</label>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group date">
                            <input type="text" {{($daynum==1)?'required="required"':''}} name="install_date{{$daynum}}" class="form-control datepicker1" />
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group">
                          <select name="install_time{{$daynum}}"  {{($daynum==1)?'required="required"':''}} class="form-control">
                            <option>- time slot -</option>
                            <option value="8am - 12pm">8am - 12pm</option>
                            <option value="12pm - 4pm">12pm - 4pm</option>
                            <option value="4pm - 8pm">4pm - 8pm</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>

              </div>

              <div class="row">
                
                <div class="col-lg-8">
                  <h3>Contact Information</h3>
                  <p>Please enter the name and phone number of a person who will be present during the installation..</p>
                    <div class="row mb-2">
                      
                        <label class="col-sm-4 text-right">Installation address</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" name="installation_address"  required="required" class="form-control" />
                        </div>
                      
                    </div>
                    <div class="row mb-2">
                      
                        <label class="col-sm-4 text-right">Name</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" name="installation_name"  required="required" class="form-control" />
                        </div>
                      
                    </div>

                    <div class="row mb-2">
                      
                        <label class="col-sm-4 text-right">Phone number</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" name="phone_number"  required="required" class="form-control" />

                          <p>Please enter a 10 digit <b>cell or landline phone number</b>. VoIP phone numbers are not acceptable.</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                      
                        <label class="col-sm-4 text-right"></label>
                        <div class="col-sm-8 input-group">
                            <label class="checkbox">
                                <input type="checkbox" name="over_18" id="checkbox-over_18"  required="required" value=
                                "over_18" />
                                <span class="checkmark" style="margin-left: 0px;"></span>
                            </label>
                            <span style="margin-left: 30px;">Someone over 18 will be present for installation.</span>
                            <!-- <b>Please note a Shaw representative will perform the installation.</b> -->
                        </div>
                    </div>

                    <div class="row sm-2">
                      
                        <label class="col-sm-4 text-right"></label>
                        <div class="col-sm-8 input-group" >
                            <button type="submit" class="confirm-btn">Confirm</button>
                        </div>
                    </div>

                    
                </div>
              </div>

            </form>

          @endif
        @endif



      </div>
    </section>

@push('css')

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

@endpush

@push('js')
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script type="text/javascript">
    // datepicker1
    $('.datepicker1').datepicker({
     startDate: '+1d',
    }); 
  </script>
@endpush