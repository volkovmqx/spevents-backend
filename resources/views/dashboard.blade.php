@extends('layout.master')


@section('title')
Dashboard
@endsection

@section('content')


<div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4" href="#"><i class=" icon-bookmark"></i><b>{{ $numberofevents }}</b>
                                        <p class="text-muted">
                                            Events</p>
                                    </a><a class="btn-box big span4" href="#"><i class="icon-fire"></i><b>{{ $currentevent->name }}</b>
                                        <p class="text-muted">
                                            {{ $currentevent->dateandtime }} @ {{ $currentevent->place }}</p>
                                    </a><a class="btn-box big span4" href="#"><i class="icon-user"></i><b>{{ $numberofusers }}</b>
                                        <p class="text-muted">
                                            Users</p>
                                    </a>
                                </div>
                                </div>
                                <div class="module">
							<div class="module-head">
								<h3>Lastest Subscribes</h3>
							</div>
							<div class="module-body">
								<table class="table table-condensed">
								  <thead>
									<tr>
									  <th>Name</th>
									  <th>Event Name</th>
									  <th>Subscribe date</th>
									</tr>
								  </thead>
								  <tbody>
								  @foreach ($subscribes as $subscribe)
								  <tr>
									  <td>{{$subscribe->UN}}</td>
									  <td>{{$subscribe->EN}}</td>
									  <td>{{$subscribe->created_at}}</td>
									</tr>
								  @endforeach
								  </tbody>
								</table>

								
							</div>


@endsection