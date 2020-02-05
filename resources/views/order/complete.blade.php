@extends('layouts.master')

@section('title','Your Order')

@section('poster')
<!--==========================
    Intro Section
  ============================-->
  
  <section id="intro" class="cart-cover" style="height: 12vh;">
    <div class="intro-container wow fadeIn">
      <!--<h1 class="mb-4 pb-0">Unbeatable Internet, TV, <br/>Home Phone & Home Security</h1>-->
      <!--<a href="#about" class="about-btn scrollto">Shop Online</a>-->
    </div>
  </section>
@stop

@section('content')
    <style>
         .list-group .list-group-item {text-align: initial;}
    </style>

<main id="main">

    
     <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Order Complete</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-6">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Transaction ID</h3>
              <p>{{$order->transaction_id}}</p>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Order Number</h3>
              <p>{{$order->order_number}}</p>
            </div>
          </div>

        </div>
    
        <div class="row contact-info">
            
          <div class="col-md-6">            
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Name</b> {{$order->name}}</li>
              <li class="list-group-item"><b>First & Last Name</b> {{$order->first_name}} {{$order->last_name}}</li>
              <li class="list-group-item"><b>Email</b> {{$order->email}}</li>
              <li class="list-group-item"><b>Phone Number</b> {{$order->phone_number}}</li>
              <li class="list-group-item"><b>Grand Total</b> ${{$order->grand_total}}</li>
	          <li class="list-group-item"><b>Discount</b> ${{$order->discount}}</li>
	          <li class="list-group-item"><b>Total</b> ${{$order->total}}</li>
	          <li class="list-group-item"><b>Shipping</b> ${{$order->shipping}}</li>
            </ul>
          </div>
          
          <div class="col-md-6">            
            <ul class="list-group list-group-flush">
	          <li class="list-group-item"><b>Homephone</b> {{$order->homephone}}</li>
	          <li class="list-group-item"><b>Cellphone</b> {{$order->cellphone}}</li>
	          <li class="list-group-item"><b>Prefered Method</b> {{$order->prefered_method}}</li>
			  <li class="list-group-item"><b>Plan Install Fee</b> ${{$order->plan_install_fee}}</li>
			  <li class="list-group-item"><b>First Install date & time</b> {{$order->install_date1}} {{$order->install_time1}}</li>
			  <li class="list-group-item"><b>Second Install date & time</b> {{$order->install_date2}} {{$order->install_time2}}</li>
			  <li class="list-group-item"><b>Thrid Install date & time</b> {{$order->install_date3}} {{$order->install_time3}}</li>
	          <li class="list-group-item"><b>Installation address</b> {{$order->installation_addr}}</li>
            </ul>
          </div>

        </div>
        
        
        <div class="row contact-info">
            @if($order->plans->count() > 0)
                @php $addons_data =  (array) json_decode($order->addons_data) @endphp
                @foreach($order->plans as $plan)
                 <div class="col-md-3"> 
                    <h3>{{strtoupper($plan->type)}}</h3>
                    <ul class="list-group list-group-flush">
        	          <li class="list-group-item"><b>Plan</b> {{$plan->title}} - ( ${{ $plan->price }} )</li>
                      
        	          @if(isset($addons_data[strtolower($plan->type)]))
        	          @php $addon = (array) $addons_data[strtolower($plan->type)]; @endphp
        	          
        	          @if(isset($addon['modem']))
                        @php $modems = (array) $addon['modem']; @endphp
                        @if(count($modems) > 0)
                            @foreach($modems as $modem)
                	            <li class="list-group-item">{{ $modem->addon->name }} - ( ${{ ($modem->buying_method == 'rent' ? ($modem->addon->rent_amount + $modem->addon->deposit) : $modem->addon->amount) }} )</li>
                            @endforeach
                        @endif
        	          @endif
        	          
        	          @if(isset($addon['other']))
                        @php $others = (array) $addon['other']; @endphp
                        @if(count($others) > 0)
                            @foreach($others as $other)
                	            <li class="list-group-item">{{ $other->addon->name }} - ( ${{ ($other->buying_method == 'rent' ? ($other->addon->rent_amount + $other->addon->deposit) : $other->addon->amount) }} )</li>
                            @endforeach
                        @endif
        	          @endif

        	          @endif
                    </ul>
                 </div>
                @endforeach
            @endif
        </div>
        

      </div>
    </section><!-- #contact -->



  </main>
@stop

@push('js')
@endpush