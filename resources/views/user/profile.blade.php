@extends('layouts.master')

@section('title')
	Guitar Shop | Profile
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>User Profile</h1>
		<hr>
		<h2>Your Orders</h2>
		@foreach($orders as $order)
		<div class="panel panel-default">
 			<div class="panel-body">
    			<ul class="list-group">
    				@foreach($order->cart->items as $item)
  					<li class="list-group-item">
  						<span class="badge">P {{ $item['price'] }}</span>
  						{{ $item['item']['title'] }} | {{ $item['qty'] }} Units
  					</li>
  					@endforeach
				</ul>
  			</div>
  			<div class="panel-footer">
  				<strong>Total price: P {{ $order->cart->totalPrice }}</strong>
  			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection