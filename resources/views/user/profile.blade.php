@extends('layouts.master')

@section('title')
	Guitar Shop | Profile
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Profile</h1>
		<div class="container">
      		<div class="row">
        		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
	  				<div class="panel panel-info">
            			<div class="panel-heading">
              				<h3 class="panel-title">User Info</h3>
            			</div>
            			<div class="panel-body">
              				<div class="row">
                				<div class=" col-md-12 col-lg-12 "> 
                  					<table class="table table-user-information">
                    					<tbody>
                    						<tr>
												<td>Full Name</td>
												<td>{{ Auth::user()->fullName }}</td>
											</tr>
											<tr>
												<td>Address</td>
												<td>{{ Auth::user()->address }}</td>
											</tr>
											<tr>
												<td>Email</td>
												<td>{{ Auth::user()->email }}</a></td>
											</tr>
                    					</tbody>
                 					</table>
                				</div>
             				</div>
            			</div>
                 		<div class="panel-footer clearfix">
                        	<span class="pull-right">
                            	<a href="#" type="button" class="btn btn-primary">Edit profile</a>
                        	</span>
                    	</div>
         			</div>
        		</div>
      		</div>
    	</div>
		<hr>
		<hr>
		<h2>Your Order History</h2>
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