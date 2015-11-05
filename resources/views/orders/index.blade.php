@extends('index')

@section('content')
<h3>Orders</h3>

@if (count($orders)) 
	<ul>
		@foreach ($orders as $order)
			<li><a href="{{url ('/orders', $order->id)}}">Source {{$order->source}}</a></li>
			<li>Destination {{$order->destination}}</li>
			<br />
		@endforeach
	</ul>
@else
	 <p>no order!</p>
@endif
@stop
{!! Form::open(['url' => 'orders']) !!}
		@include('orders.partial', ['submit_name' => 'Create'])
	{!! Form::close() !!}

}

{"command":"request",
"data":
	{"api_key":"mysendykey",
	"api_username":"mysendyusername",
	"from":
		{"from_name":"Green House",
		"from_lat":-1.300577,
		"from_long":36.78183,
		"from_description":""},
	"to":
		{"to_name":"KICC",
		"to_lat":-1.28869,
		"to_long":36.823363,
		"to_description":""},
	"recepient":
		{"recepient_name":"Evanson",
		"recepient_phone":"0723680311",
		"recepient_email":"evansonbiwot@gmail.com"},
	"delivery_details":
		{"pick_up_date":"2016-04-20 12:12:12",
		"collect_payment":
			{"status":false,
			"pay_method":0,
			"amount":10},
		"return":true,
		"note":" Sample note",
		"note_status":true,
		"request_type":"delivery"}}}

	
			