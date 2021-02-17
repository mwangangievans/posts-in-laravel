@extends('layouts.app')

@section('content')

<div class ="container">
<h1>Post a Product</h1>

{!!Form::open(['action'=>'App\Http\Controllers\PostController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}

<div class ="form-group">
{{Form::label('description', 'description', ['class' => 'awesome'])}}
{{Form::textarea('description', '',['class'=>'form-control', 'placeholder'=>'Write the description of the product'])}}
</div>
<div class ="form-group">
{{Form::label('price', 'PRICE', ['class' => 'awesome'])}}
{{Form::text('price', '',['class'=>'form-control', 'placeholder'=>'price'])}}
</div>
<div class ="form-group">
{{Form::label('rating', 'RATING', ['class' => 'awesome'])}}
{{Form::text('rating', '',['class'=>'form-control', 'placeholder'=>'rating'])}}
</div>
<div class ="form-group">
	{{Form::file('image')}}
</div>
{{Form::submit('submit',['class'=>"btn btn-primary"])}}
{!!Form::close() !!}

@endsection