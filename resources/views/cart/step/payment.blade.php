    <!--==========================
      What's included in all our plans
    ============================-->
    <section id="speakers" class="about-all-plans wow" style="padding: 60px 0 200px 0;">
      
      <div class="container">
		<form action="{{route('cart.do.payment')}}" method="POST" id="payment-form">
			@csrf

	        <div class="row">
	          <div class="col-lg-9">
	            <h3>Contact Information </h3>
	            <hr/>
	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">First Name</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="text" name="first_name" class="form-control" required="required" />
	            	</div>
	            </div>

	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Last Name</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="text" name="last_name" class="form-control"  required="required" />
	            	</div>
	            </div>

	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Email</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="email" name="email" class="form-control"  required="required" />
	            	</div>
	            </div>

	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Home Phone</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="text" name="homephone" class="form-control phonenumber"  required="required" />
	            	</div>
	            </div>

	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Cell Phone</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="text" name="cellphone" class="form-control phonenumber"  required="required" />
	            	</div>
	            </div>

	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Prefered Method Of Contact</label>
	            	<div class="col-sm-5">    		
	 		        	<select name="prefered_method" class="form-control" required="required">
	 		        		<option value="">-prefered method of contact-</option>
	 		        		<option value="email">Email</option>
	 		        		<option value="homephone">Home Phone</option>
	 		        		<option value="cellphone">Cell Phone</option>
	 		        	</select>
	 		        </div>
	            </div>

	          </div>
	        </div>

	        <div class="row">
	          <div class="col-lg-9">
	            <h3>Payment Cart Detail </h3>
	            <hr/>
	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Holder Name</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="text" class="form-control" name="holder_name"  required="required" />
	            	</div>
	            </div>

	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Number</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="number" name="account_number" class="form-control account-number"  required="required" />
	            	</div>
	            </div>

	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Expiry Month</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="number" name="expiry_month" class="form-control expiry-month" max=12  required="required" />
	            	</div>
	            </div>


	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Expiry Year</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="number" name="expiry_year" class="form-control expiry-year" min=20  required="required" />
	            	</div>
	            </div>


	            <div class="row form-group">
	            	<label class="col-sm-4 text-right">Cvd</label>
	            	<div class="col-sm-5">    		
	 		           	<input type="number" class="form-control cvd" name="cvd" required="required" />
	            	</div>
	            </div>
	          </div>
	        </div>

	        
		</form>	       
      </div>
    </section>

@push('js')
    <script src="/assets/plugins/jQueryMask/dist/jquery.mask.min.js"></script>
    <script src="/assets/plugins/jQueryValidation/dist/jquery.validate.min.js"></script>

    <script type="text/javascript">
		$('.account-number').mask('0000000000000000', {placeholder: "________________"});
		$('.expiry-month').mask('00', {placeholder: "__"});
		$('.expiry-year').mask('00', {placeholder: "__"});
		$('.cvd').mask('000', {placeholder: "___"});
		$('.phonenumber').mask('0000-000000', {placeholder: "____-______"});

		$('#payment-form').validate();	

		$('#footer-submit-btn').click(function(e){
			$('#payment-form').submit();
		});	
    </script>
@endpush
