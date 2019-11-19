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
            @php $active = 'active'; @endphp
            @foreach($stepqueue as $_istep=>$_step)
            <li class="{{$active}}" > <a href="{{route('cart.change.step', $_istep)}}">{{ ucwords($_step) }}</a></li>
            @if($step==$_step) @php $active = ''; @endphp @endif
            @endforeach
    </ul>
  </section>

  @include('cart.step.' . $step)
</main>
@stop

