@extends('layouts.app')

@section('content')

<div class ="container">
<h1>Edit  post</h1>

{!!Form::open(['action'=>['App\Http\Controllers\PostController@update',$post->id],'method'=>'POST'])!!}
<div class ="form-group">
{{Form::label('description', 'description', ['class' => 'awesome'])}}
{{Form::textarea('description', $post->description,['class'=>'form-control', 'placeholder'=>'description'])}}
</div>
<div class ="form-group">
{{Form::label('price', 'price', ['class' => 'awesome'])}}
{{Form::text('price', $post->price,['class'=>'form-control', 'placeholder'=>'price'])}}
</div>
<div class ="form-group">
{{Form::label('rating', 'rating', ['class' => 'awesome'])}}
{{Form::text('rating', $post->rating,['class'=>'form-control', 'placeholder'=>'rating'])}}
</div>
{{Form::hidden('_method','PUT')}}
{{Form::submit('submit',['class'=>"btn btn-primary"])}}
{!!Form::close() !!}

@endsection