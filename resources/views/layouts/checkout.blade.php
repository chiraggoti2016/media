@extends('app')

@push('css')
<style type="text/css">
	#intro.cart-cover {
	    background: black;
	}
</style>
@endpush

@section('header')
  @include('layouts.checkout.header')
@endsection

@section('footer')
  @include('layouts.checkout.footer')
@endsection

@push('js')
  
@endpush