@extends('layouts.app')

@section('content')

<div class =" container-fluid ">
<h1>posts</h1>
@if(count($posts) > 0)
    @foreach($posts as $post)
   <a href="/posts/{{$post->id}}">{{$post->description}}</a><br><br>
      {{$post->price}}<br><br>
            {{$post->rating}}<br><br>

     <small>posted   {{$post->created_at->diffForHumans()}}</small><br><br>
     
    
@endforeach
{{$posts->links()}}
@else
<p>no post found</p>
@endif
</div>
@endsection
