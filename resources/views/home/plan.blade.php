@extends('layouts.default')

@section('title','Plans')

@section('poster')
  @include('home.slider')
@stop

@push('css')
<style type="text/css">
  .plans-tab-single__features label span{
    display: inline;
  }
</style>
@endpush

@section('content')
<section id="plans" class="internet-plans">
  <div class="container">
      <div class="row" style="display: none;">
          <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="section-title">
                  <h1>Internet Packages</h1>
              </div>
              <!-- section-title -->
          </div>
      </div>
      <div class="row" style="margin-top: 50px;">
          <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 30px;">
            <div class="internet-plans__tabs">
              <ul id="cable_1" class="nav nav-tabs plans__tab" role="tablist">
                  <li role="presentation" class="active"><a href="#plans-tab-one" aria-controls="plans-tab-one" role="tab" data-toggle="tab"><span class="icon-tab icon-ethernet"></span> Most <span>Popular Plans</span></a></li>
              </ul>
              <!-- TAB -->
              <!-- TAB Content -->
              <div class="tab-content plans-content" style="margin-bottom: 60px;">
                <div role="tabpanel" class="tab-pane active" id="plans-tab-one">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      @foreach($plans as $p_index => $plan)
                        @php $price = splitAmount(getPrice($plan)); @endphp    

                        <div class="plans-tab-single plan" id="{{($p_index+1)}}">
                            <div class="plans-tab-single__title">
                                <h6>{{$plan->title}}</h6>
                                <!-- <small>{{ str_replace('-','',$plan->tagline)}}</small> -->
                            </div>
                            <div class="plans-tab-single__body">
                              @if(strtolower($plan->type) == 'internet')
                              <div class="plans-tab-single__info">
                                  <ul class="nav">
                                      <li><span class="icon-speedometer"></span>
                                          <p>{{$plan->downspeed}} {{ucwords($plan->downspeed_type)}}</p>
                                      </li>
                                      <li><span class="icon-upload"></span>
                                          <p>{{$plan->upspeed}} {{ucwords($plan->upspeed_type)}}</p>
                                      </li>
                                </ul>
                              </div>
                              @elseif(strtolower($plan->type) == 'tv')
                              <!-- single__info -->
                              <div class="plans-tab-single__features plan_features" data-default="0">
                                <label class="checkbox-styled" data-default="0">
                                   <!-- <input type="radio" name="5770_1" value="Capacité Transfert ILLIMITÉ " data-price="26.99" checked="">
                                    <div class="features__wrapper">
                                        <i class="features__icon unlimited__icon icon-bandwidth"></i>
                                        <span class="features__text">Xyz</span>
                                    </div> -->
                                    @foreach($plan->channels->take(5) as $channel)
                                      <span class="ml-2 mr-2">
                                        @php echo $channel->logo_tag; @endphp
                                      </span>
                                    @endforeach
                                </label>
                              </div>
                              @endif
                              <!-- Plan features -->
                              <div class="plans-tab-single__total plan__total">
                                
                                <form action="{{route('cart.index')}}" method="POST">
                                    @csrf
                                    <label>
                                      <sup>$</sup><span id="plan_total_1">{{getPrice($plan)}}</span><sub>monthly</sub>
                                    </label>
                                    <input type="hidden" name="plan_id" value="{{$plan->id}}" />
                                    <input type="hidden" name="plan_type" value="{{$plan->type}}" />
                                    <input type="submit" name="plan_1" value="Détails">

                                  </form>
                              </div>
                            </div>
                        </div>
                      @endforeach

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</section>
@stop

@push('js')
@endpush