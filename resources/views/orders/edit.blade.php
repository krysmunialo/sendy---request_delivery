@extends('app')
@section('content')
    <h3>Edit This</h3>
    {!! Form::model($order,['method' => 'PATCH', 'action' => ['OrdersController@update', $order->id]]) !!}
        @include('orders.partial', ['submit_name' => 'Update'])
    {!! Form::close() !!}
    @include('errors.list')
@stop