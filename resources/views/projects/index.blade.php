@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
<div class=" col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
	<div class="panel panel-primary ">
	  <div class="panel-heading">projects<a class="pull-right btn btn-primary  btn-sm" href="/projects/create">create new project</a></div>
	  <div class="panel-body">
	    <ul class="list-group">
	 		@foreach($projects as $project)
	 		 <li class="list-group-item"><a href="/projects/{{$project->id}}">{{$project->name}}</a></li>
	 	@endforeach
	 </ul>
	  </div>
	</div>
</div>

@endsection

