

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

	                  @foreach($options[$_plan->type] as $option)
	                    <li style="font-size: 12px;"><span class="fa-li"><i class="fa fa-check"></i></span>{{$option}}</li>
	                  @endforeach
	                </ul>
                @endif
                <hr>
                <div class="row">
			        @php($price = isset($_plan->price) ? $_plan->price : 0)
			        @php(list($whole, $decimal) = explode('.', (float)$price))

					<div class="col-sm-6 text-left">
						<h6 class="card-price">
	                        <div class="featured-new__price-helper">
	                              <div class="price price--format_english" style="color: #00000;">
	                                $<span class="price__value--dollars" style="color: #00000;">{{$whole}}</span>
	                                <span class="price__group">
	                                  <span class="price__value--cents" style="color: #00000;">.{{$decimal}}</span>
	                                  <div class="price__period" style="color: #00000;">/Month</div>
	                                </span>
	                              </div>
	                        </div>
	                      </h6>
	                </div>
					<div class="col-sm-6 text-right">
						@if($plan->id == $_plan->id)
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