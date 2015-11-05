
<div class="form-group">
    {!! Form::label('source', "Source") !!}
    {!! Form::text('source', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('destination', "Destination") !!}
    {!! Form::text('destination', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('means', "Means") !!}
    {!! Form::text('means', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('note', "Note") !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_name, ['class' => 'btn btn-primary form-control']) !!}
</div>