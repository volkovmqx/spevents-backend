@extends('layout.master')


@section('title')
Create a new Event
@endsection

@section('content')





<div class="module">
    <div class="module-head">
        <h3>Create an event</h3>
    </div>
    <div class="modcontainer module-body">
    @if ($errors->any())
	    @foreach ($errors->all() as $error)
		    <div class="alert alert-error">
				<button data-dismiss="alert" class="close" type="button">×</button>
				<strong>{{ $error }}</strong>
			</div>
	    @endforeach
    @endif

		{!! Form::open(array('class' => 'form-horizontal row-fluid', 'url' => 'events','files' => true )) !!}

		<div class="control-group">
		{!! Form::label('name', 'Name of the Event', array('class' => 'control-label')) !!}
			<div class="controls">
				{!! Form::text('name', null, array('class' => 'span8')) !!}
			</div>
		</div>
		<div class="control-group">
		{!! Form::label('description', 'Description', array('class' => 'control-label')) !!}
			<div class="controls">
				{!! Form::textarea('description', null, array('class' => 'span8')) !!}
			</div>
		</div>
		<div class="control-group">
		{!! Form::label('dateandtime', 'Date and time', array('class' => 'control-label')) !!}
			<div class="controls">
				<div class="input-append">
					{!! Form::text('dateandtime', null, array('class' => 'span8', 'id' => 'datetimepicker')) !!}<span class="add-on icon icon-time"></span>
				</div>
				
			</div>
		</div>
		<div class="control-group">
		{!! Form::label('place', 'Place of the Event', array('class' => 'control-label')) !!}
			<div class="controls">
				{!! Form::text('place', null, array('class' => 'span8')) !!}
			</div>
		</div>
		<div class="control-group">
		{!! Form::label('image', 'Image of the event', array('class' => 'control-label')) !!}
			<div class="controls">
				{!! Form::file('image', null, array('class' => 'span8')) !!}
			</div>
		</div>


		<div class="control-group">
			<div class="controls">
				{!! Form::submit('Submit', array('class' => 'btn')) !!}
			</div>
		</div>
		{!! Form::close() !!}

		
    </div>
</div>

@endsection