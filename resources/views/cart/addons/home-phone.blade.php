<!-- Modem start -->
@php $_modemdata = isset($cart['addon']['home_phone']['modem']) ? $cart['addon']['home_phone']['modem'] : []; @endphp

@php $_modemkeys = count($_modemdata) ? array_keys($_modemdata) : []; @endphp

 <div class="row">
  <div class="col-lg-9">
    <h3>Phone Adapter</h3>

    @if(count($_modemdata))
  		<p>Your adapter:
  			@foreach($_modemdata as $_mdata)
	  			<label class="label label-primary">{{ $_mdata['addon']->name }}</label> 	
  			@endforeach
  		</p> 
    @else
	    <p>Please select modem options</p>
	@endif
  </div>
  <div class="col-lg-3 text-center change-link-container">
  	  @if( count($_modemkeys) == 0)
      	<a href="#" class="select-btn" id="select-modem-btn">Select</a>            
      @else
	      <div class="checkout-success"><i class="fa fa-check"></i></div>
	      <a href="#" id="change-addon-link" data-container="#modem-container" >Change</a>            
	  @endif
  </div>
</div>

<div class="row" id="modem-container" style="display: none;">
 <div class="container alternate">

 	@if(isset($addons['modem']) && $modems = $addons['modem'])

    	@foreach($modems as $_modem)
	    <div class="row">
	    	@php $buying_method = "purchase"; @endphp
	    	@if(isset($_modemdata[$_modem->id]))
				@php $buying_method = $_modemdata[$_modem->id]['buying_method']; @endphp
			@endif
	    	<div class="col-sm-3"><img src="{{ asset('storage/' . $_modem->image) }}"/></div>
	      	<div class="col-sm-6">
	      		<h2>{{$_modem->name}}</h2>
	      		<p>{{$_modem->descriptions}}</p>
	      		<ul class="fa-ul">
	      			@if(isset($_modem->amount) && $_modem->amount>0)
		      			<li>
		      				<label class="radio">Purchase <span class="label label-primary">${{$_modem->amount}}</span>
							  	<input type="radio" name="buying_method[{{$_modem->id}}]" {{($buying_method=='purchase')?'checked="checked"':''}} value="purchase">
							  	<span class="checkmark"></span>
							</label>
		      			</li>
		      		@endif

	      			@if(isset($_modem->rent_amount) && $_modem->rent_amount>0)
		      			<li>
		      				<label class="radio">Rent 
		      						<span class="label label-primary">${{$_modem->rent_amount}} / {{$_modem->rent_on_every}}</span> 
		      						<span class="label label-primary"> + deposit ${{$_modem->deposit}}</span>
		      						
							  	<input type="radio" name="buying_method[{{$_modem->id}}]" {{($buying_method=='rent')?'checked="checked"':''}}  value="rent">
							  	<span class="checkmark"></span>
							</label>
		      			</li>
	      			@endif
	      		</ul>
	      	</div>
	    	<div class="col-sm-3 text-center"><a href="#" class="select-btn {{ (in_array($_modem->id,$_modemkeys)?'select':'') }}" data-modem-id="{{$_modem->id}}" data-url="{{route('cart.add.addon','home_phone')}}" id="modem-confirm-btn">Confirm</a></div>
	    </div>
	    @endforeach
 	@endif

  </div>
  
</div>
<!-- end:modem  -->

<!-- Other Addos start -->
@php $_otherdata = isset($cart['addon']['home_phone']['other']) ? $cart['addon']['home_phone']['other'] : []; @endphp

@php $_otherkeys = count($_otherdata) ? array_keys($_otherdata) : []; @endphp

@if(isset($cart['addon']['home_phone']['modem'])) 

 <div class="row">
  <div class="col-lg-9">
    <h3>Add-ons</h3>

    @if(count($_otherdata))
  		<p>Your addons:
  			@foreach($_otherdata as $_mdata)
	  			<label class="label label-primary">{{ $_mdata['addon']->name }}</label> 	
  			@endforeach
  		</p> 
    @else
	    <p>Choose additional devices you may need.</p>
	@endif
  </div>
  <div class="col-lg-3 text-center change-link-container">
  	  @if( count($_otherkeys) == 0)
      	<a href="#" class="select-btn" id="select-other-btn">Select</a>            
      @else
	      <div class="checkout-success"><i class="fa fa-check"></i></div>
	      <a href="#" id="change-other-addon-link" data-container="#other-container" >Change</a>            
	  @endif
  </div>
</div>

@endif

<div class="row" id="other-container" style="display: none;">
 <div class="container alternate">

 	@if(isset($addons['other']) && $others = $addons['other'])

    	@foreach($others as $_other)
	    <div class="row">
	    	<div class="col-sm-3"><img src="{{ asset('storage/' . $_other->image) }}"/></div>
	      	<div class="col-sm-6">
	      		<h2>{{$_other->name}}</h2>
	      		<p>{{$_other->descriptions}}</p>
	      		<p> <span class="label label-primary">${{$_other->amount}}</span> </p>
	      	</div>
	      	@if(in_array($_other->id,$_otherkeys))
	      		<div class="col-sm-3 text-center"><a href="#" class="select-btn" data-other-id="{{$_other->id}}" data-url="{{route('cart.remove.addon','home_phone')}}" id="other-confirm-btn">Cancel</a></div>
	      	@else 
	      		<div class="col-sm-3 text-center"><a href="#" class="select-btn" data-other-id="{{$_other->id}}" data-url="{{route('cart.add.addon','home_phone')}}" id="other-confirm-btn">Confirm</a></div>
	      	@endif
	    	
	    </div>
	    @endforeach
 	@endif

  </div>
  
</div>
<!-- Other Addos end -->




@push('js')
<script>
	/*modem */
	$('#select-modem-btn').click(function(e){
		$(this).hide();
		$("#next-form .next-form-input-container").empty();
		$('#modem-container').show();
	});
	$('#modem-confirm-btn').click(function(e){
		$(this).addClass('select');
		var modemId = $(this).data('modem-id');
		var url = $(this).data('url');
		var buying_method = $('input[name="buying_method['+modemId+']"]:checked').val();

		$("#next-form").attr('action', url);

		$("#next-form .next-form-input-container")
		.append($('<input type="hidden" name="id[]" value="'+modemId+'" />'))
		.append($('<input type="hidden" name="buying_method[]" value="'+buying_method+'" />'));

		$('#modem-confirm-btn').attr("disabled", true);
	    $("#next-btn").attr("disabled", false);
	});
	/*modem end */

	/*other */
	$('#select-other-btn').click(function(e){
		$(this).hide();
		$("#next-form .next-form-input-container").empty();
		$('#other-container').show();
	});
	$('#other-confirm-btn').click(function(e){
		$(this).addClass('select');
		var otherId = $(this).data('other-id');
		var url = $(this).data('url');

		$("#next-form").attr('action', url);

		$("#next-form .next-form-input-container")
		.append($('<input type="hidden" name="id[]" value="'+otherId+'" />'))
		.append($('<input type="hidden" name="buying_method[]" value="none" />'));

		$('#other-confirm-btn').attr("disabled", true);
	    $("#next-btn").attr("disabled", false);
	});
	/*modem end */

	// change-addon-link
	$('#change-addon-link').click(function(){
      $('.change-link-container').hide();
	  $("#next-form .next-form-input-container").empty();
      var container = $(this).data('container');
      $(container).show();
      $("#next-btn").attr("disabled", false);
    });

    $('#change-other-addon-link').click(function(){
      $('.change-link-container').hide();
	  $("#next-form .next-form-input-container").empty();
      var container = $(this).data('container');
      $(container).show();
      $("#next-btn").attr("disabled", false);
    });

</script>
@endpush