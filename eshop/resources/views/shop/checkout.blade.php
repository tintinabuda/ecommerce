@extends('layouts.master')

@section('title')
	Guitar Shop | Checkout
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<h1>Order Billing</h1>
			<h4> Total: <strong>P {{ $total }}</strong></h4>
			<a href="{{ route('order-success') }}" type="button" class="btn btn-success">Submit Order</a>
		</div>
	</div>
@endsection