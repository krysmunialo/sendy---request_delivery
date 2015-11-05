@extends('app')

<style>
	#map-canvas{
		width:99%;
		height:99%
	}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script language="javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&v=3&key=AIzaSyAKiaHxVuZEjtX77ZNhQzLgnP3XGuPvnc8&libraries=places"></script>


{!! Form::open(['method' => 'post', 'action' => ['OrdersController@toApi']]) !!}
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			
			@if(isset($pns))
				<div class='alert alert-warning'>
					@if($pns['status'] == 'true'))
						Order No {{$pns['data']['order_no']}} <br/>
						Amount  {{$pns['data']['amount']}} <br/>
						Currency {{$pns['data']['currency']}} <br/>
						Distance {{$pns['data']['distance']}} <br/>
						Nearesr Rider {{$pns['data']['eta']}} <br/>
						Approximate Delivery Time After PickUp {{$pns['data']['etd']}} <br/>
					@else
						@foreach ($pns as $p)
							{{$p}} <br />
						@endforeach
					@endif	
				</div>
				<a class="btn btn primary" href="{{ url('/orders/create') }}">Make new order</a>
			@else
				<div class="form-group">
					<label for="source">Source</label>
					<input type="text" class="form-control" name="source" id="src">
				</div>
				<div class="form-group">
					<label for="destination">Destination</label>
					<input type="text" class="form-control" name="destination" id="des">
				</div>
					<input type="hidden" class="form-control" name="lat" id="lat">
					<input type="hidden" class="form-control" name="lng" id="lng">
					<input type="hidden" class="form-control" name="lat1" id="lat1">
					<input type="hidden" class="form-control" name="lng1" id="lng1">
				<div class="form-group">
					<input type="submit" class="form-control btn btn-primary" >
				</div>
			@endif	
			
		</div>
		<div class="col-sm-6">
			<div id="map-canvas">
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

<script>
	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
			lat: 1.2886,
			lng: 36.8231
		},
		zoom:7
	});
	var marker = new google.maps.Marker ({
		position:{
			lat: 1.2886,
			lng: 36.8231
		},
		title:'source',
		map:map,
		draggable:true
	});
	var marker1 = new google.maps.Marker ({
		position:{
			lat: 3.21,
			lng: 34.32
		},
		title: 'destination',
		map:map,
		draggable:true
	});
	var searchBox = new google.maps.places.SearchBox(document.getElementById('src'));
	var searchBox1 = new google.maps.places.SearchBox(document.getElementById('des'));
	google.maps.event.addListener(searchBox, 'places_changed', function(){
		var places =searchBox.getPlaces();
		var bounds = new google.maps.LatLngBounds();
		var i, place;
		for(i=0; place=places[i]; i++){
			bounds.extend(place.geometry.location);
			marker.setPosition(place.geometry.location);
		}
		map.fitBounds(bounds);
		map.setZoom(7);
	});
	google.maps.event.addListener(searchBox1, 'places_changed', function(){
		var places =searchBox1.getPlaces();
		var bounds = new google.maps.LatLngBounds();
		var i, place;
		for(i=0; place=places[i]; i++){
			bounds.extend(place.geometry.location);
			marker1.setPosition(place.geometry.location);
		}
		map.fitBounds(bounds);
		map.setZoom(7);
	});
	google.maps.event.addListener(marker, 'position_changed', function(){
		var lat = marker.getPosition().lat();
		var lng = marker.getPosition().lng();
		$('#lat').val(lat);
		$('#lng').val(lng);
	});
	google.maps.event.addListener(marker1, 'position_changed', function(){
		var lat1 = marker1.getPosition().lat();
		var lng1 = marker1.getPosition().lng();
		$('#lat1').val(lat1);
		$('#lng1').val(lng1);
	});
</script>

	
