@extends('app')

@section('content')
<h3>Order {{$order->id}}</h3>

Information
<p>Source {{$order->source}}</p>
<p>Destination {{$order->destination}}</p>
<p>Means {{$order->means}}</p>
<p>Note {{$order->note}}</p>
@stop