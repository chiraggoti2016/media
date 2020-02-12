@extends('layouts.default')

@section('title','Home')

@section('poster')
  @include('home.slider')
@stop

@section('content')
  <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid small-iconbox vc_custom_1548355828634 vc_row-has-fill">
    <div class="wpb_column vc_column_container vc_col-sm-12">
      <div class="vc_column-inner vc_custom_1475853057895">
        <div class="wpb_wrapper">
          <div id="expertisesection" class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1544131862840 vc_column-gap-10">
              @php $options = config('plantypes.options') @endphp
              @foreach($plans as $plan)
                @php $price = splitAmount(getPrice($plan)); @endphp
                <div class="wpb_column vc_column_container vc_col-sm-3 vc_col-has-fill">
                  <div class="vc_column-inner vc_custom_1544131467824">
                    <div class="wpb_wrapper">
                      <div class="key-icon-box icon-default icon-top  kd-animated zoomIn expertisesec" style="background-color: none;" >
                        <a href="{{ route('plan', $plan->type) }}" target="_self" title="">
                          <p class="text-center" style="color: #000000;">@if (view()->exists('svg.' . strtolower(str_replace('_','-',$plan->type)))) 
                            @include('svg.' . strtolower(str_replace('_','-',$plan->type)))
                          @endif</p>
                          @php $type_array = ['internet' => 'INTERNET' ,'tv' => 'TV','home_phone' => 'PHONE','home_security' => 'SECURITY']; @endphp
                          <h4 class="service-heading" style="color: #000000;">{{$type_array[$plan->type]}}</h4>
                        </a>
                      </div>
                      <div class="vc_empty_space"   style="height: 32px" >
                        <span class="vc_empty_space_inner"></span>
                      </div>
                      <a  href="{{ route('plan', $plan->type) }}" target="_self" title="Forfaits internet" class="tt_button    " >
                        <span class=" iconita"></span>
                        <span class="prim_text">Détails</span>
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>

@stop

@push('js')
@endpush