@extends ('app')
<label class="alert alert-warning"> Order Details</label>
<div class="row">
	<div class="col-sm-8">
		<legend>Request</legend>
		@foreach( $qst as $q)
			{q}
		@endforeach
	</div>
	<div class="col-sm-4">
		<legend>Response</legend>
		@foreach( $pns as $p)
			{p}
		@endforeach
	</div>

</div>
<code>Back To Make Request</code>