@extends('app')

@section('content')

<h1>Edit: {!! $article->title !!}</h1>

{!! Form::model($article,['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
	
	<div class="form-group">

	{!! Form::label('title', 'Title:') !!}

	{!! Form::text('title', null, ['class' => 'form-control']) !!}

	</div>

	<!-- Body Form Input -->
	
	<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
	</div>

	<!-- Published At Input -->

	<div class="form-group">
	{!! Form::label('published_at','Publish On:') !!}
	{!! Form::input('date','published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
	</div>

	<!-- Add Article Form Input -->

	<div class="form-group">
	{!! Form::submit('Update Article', ['class' => 'btn btn-primary form-control']) !!}
	</div>


{!! Form::close() !!}

	@if ($errors->any())
	<ul class="alert alert-danger"
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif


@stop