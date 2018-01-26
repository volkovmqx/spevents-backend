@extends('layout.master')


@section('title')
Edit Event Num. {{ $event->id }}
@endsection

@section('content')





<div class="module">
    <div class="module-head">
        <h3>Edit Event Num. {{ $event->id }}</h3>
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

		{!! Form::model($event,array('class' => 'form-horizontal row-fluid', 'action' =>  ['EventsController@update', $event->id],'files' => true, 'method' => 'PATCH' )) !!}

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