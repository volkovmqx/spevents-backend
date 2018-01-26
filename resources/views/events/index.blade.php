@extends('layout.master')


@section('title')
Events
@endsection

@section('content')

	@if(Session::has('success'))
	 <div class="alert alert-success">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<strong>{!! Session::get('success') !!}</strong>
	</div>
	@endif
	@if(Session::has('updated'))
	 <div class="alert alert-success">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<strong>{!! Session::get('updated') !!}</strong>
	</div>
	@endif

@foreach ($events as $event)
<div class="module">
    <div class="module-head">
        <h3>{{ $event->name }}<b class="label orange pull-right">{{ $event->dateandtime }} @ {{ $event->place }}</b></h3>
    </div>
    <div class="btn-box-row row-fluid modcontainer">
    	<img src="uploads/{{ $event->imgpath }}" alt="{{ $event->name }}" class="big span4 thumb" />
    	
    	<p class="big span8 description">{{ $event->description }}</p>
    	<div class="crudbuttons">
    	{!! Form::model($event, ['method' =>'DELETE', 'class' => 'pull-left' ,'action' => ['EventsController@destroy', $event->id]]) !!}
    		{!! Form::submit('Delete', array('class' => 'btn btn-danger pull-right eventbuttons')) !!}
    	{!! Form::close() !!}
	    	<a class="btn btn-info pull-right eventbuttons" href="{{ url('events/'.$event->id.'/edit') }}">Edit</a>
    	</div>
        </div>
</div>
@endforeach


@endsection