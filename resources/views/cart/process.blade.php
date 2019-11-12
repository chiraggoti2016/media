@extends('layouts.checkout')

@section('title','Cart')

@push('css')
    <link rel="stylesheet" href="/assets/plugins/jQuery-toast/dist/jquery.toast.min.css">
@endpush

@section('poster')

  <section id="intro" class="cart-cover" style="height: 12vh;">
    <div class="intro-container wow fadeIn">
      <!--<h1 class="mb-4 pb-0">Unbeatable Internet, TV, <br/>Home Phone & Home Security</h1>-->
      <!--<a href="#about" class="about-btn scrollto">Shop Online</a>-->
    </div>
  </section>

@stop

@section('content')
<main id="main">

  <section>
    <div class="container">
        <ul class="progressbar">
            <li class="active">Internet</li>
            <li>Installation</li>
            <li>Summary</li>
            <li>Payment</li>
    </ul>
  </section>

  @include('cart.step.' . $plan->type, ['plan' => $plan])
</main>
@stop

@push('js')
  <script src="/assets/plugins/jQuery-toast/dist/jquery.toast.min.js"></script>
  <script type="text/javascript">
    var plan = "{{$plan->type}}";
    var next_url = "{{route('cart.process')}}";
    $('.plan-select').click(function(e){
      $('.plan-select').each(function(){
        $(this).removeClass('select').html('Select');
      });
      $(this).addClass('select').html('Selected');
      plan = $(this).data('plan-id');
      next_url = $(this).data('next-url');
      $('#next-form').attr('action', next_url);
    });

    $('#change-plan-link').click(function(){
      $(this).parent().hide();
      $('#alternate-container').show();
      $("#next-btn").attr("disabled", false);
    });
  </script>
@endpush