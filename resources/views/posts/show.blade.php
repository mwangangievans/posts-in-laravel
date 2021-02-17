 @extends('layouts.app')

@section('content')

<div class ="container">
<a href="/posts" class="btn btn-primary">Go back</a>
<h1>read more about  {{$post->description}} </h1>
<ul class="list-group">
    <li class="list-group-item">{{$post->description}}<br><br>{{$post->price}}<br><br>
    	{{$post->rating}}<br><br>
    <div class="float-right">
   <small> posted on {{$post->created_at->format('M j, Y')}}</small><br>
   </div>
   </li>
</ul>
</div>
<br>
@if(!Auth::guest())
  @if(Auth::user()->id =$post->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
<!--------
{!!Form::open(['action'=>['App\Http\Controllers\PostController@destroy',$post->id],'method'=>'POST',"class"=>"float-right"])!!}
 {{Form::hidden('_medhod','DELETE')}}  
{{FORM::submit('Delete',['class'=>'btn btn-danger'])}}
{!! Form::close() !!}--->
<form method="POST" action="{{ route('posts.destroy', [ $post->id ]) }}">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit"   class="btn btn-danger btn-icon">
                <i data-feather="delete"  class="pull-right">DELETE</i>
              </button>
            </form>
@endif
@endif
@endsection
