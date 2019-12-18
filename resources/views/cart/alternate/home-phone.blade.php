

 <div class="container alternate">

    <div class="row">
      @php $options = config('plantypes.options') @endphp
		
	  @foreach($alternate_plans as $_plan) 

          <div class="col-lg-6">
            <div class="hotel">
              <h3><a href="#">{{$_plan->title}}</a></h3>

                @if(isset($options[$_plan->type]))
	                <hr>
					<ul class="fa-ul">
						<li style="font-size: 12px;"><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited calling within Canada and USA</li>
						<li style="font-size: 12px;"><span class="fa-li"><i class="fa fa-check"></i></span>15 features included</li>
						<li style="font-size: 12px;"><span class="fa-li"><i class="fa fa-check"></i></span>Low long distance rates outside Canada and USA</li>
	                </ul>
                @endif
                <hr>
                <div class="row">
			        @php $price = splitAmount($_plan->price); @endphp
					<div class="{{hasDiscount($_plan)?'col-sm-3  text-right':'col-sm-6  text-left'}} pr-2">
						<h6 class="card-price {{ !empty($_plan->discount)?'old-price':'new-price' }}">
	                        <div class="featured-new__price-helper card-price-black">
	                              <div class="price price--format_english {{ !empty($_plan->discount)?'price--old':'' }} ">
	                                $<span class="price__value--dollars">{{$price['whole']}}</span>
	                                <span class="price__group">
	                                  <span class="price__value--cents">.{{$price['decimal']}}</span>
	                                  <div class="price__period">/Month</div>
	                                </span>
	                              </div>
	                        </div>
	                    </h6>
	                </div>
	                @if(hasDiscount($_plan))
	                	@php $price = splitAmount(getDiscountedPrice($_plan)); @endphp
	                <div class="col-sm-3 text-left pl-2">
						<h6 class="card-price new-price">
	                        <div class="featured-new__price-helper card-price-black">
	                              <div class="price price--format_english">
	                                $<span class="price__value--dollars">{{$price['whole']}}</span>
	                                <span class="price__group">
	                                  <span class="price__value--cents">.{{$price['decimal']}}</span>
	                                  <div class="price__period">/Month</div>
	                                </span>
	                              </div>
	                        </div>
	                    </h6>
	                </div>
	                @endif
					<div class="col-sm-6 text-right">
						@if(isset($plan) && $plan->id == $_plan->id)
							<span class="plan-select select" data-plan-id="{{$_plan->id}}" data-next-url="{{route('cart.change.plan',[$_plan->type,$_plan->id])}}">Selected</span>
						@else
							<span class="plan-select" data-plan-id="{{$_plan->id}}" data-next-url="{{route('cart.change.plan',[$_plan->type,$_plan->id])}}">Select</span>
	                	@endif
	                </div>
                </div>

            </div>
          </div>

      @endforeach

    </div>
  </div>