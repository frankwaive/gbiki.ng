@extends ('layouts.app')
@section ('PageTitle')
{{ $post->post_title }} || Gbiki
@stop


@section ('content')
<div class="container">

  <div class="panel panel-default">
  <div class="panel-heading">
    <div class="container">
    <div class="left">
<img src="{{Storage::url(''.$post->user->avatar)}}" style="width: 80px; height: 80px; border: 3px #fff solid; border-radius: 50%; margin: 0 20px 0 0;" >
</div>

<div class="left">
  <h3>{{ $post->post_title }}</h3> 

  by <strong>{{ $post->user->name}}</strong> on {{ $post->created_at->toDayDateTimeString()}} 

 </div>
  </div>
   </div>

  <div class="panel-body">
    <p>{!! $post->post_content !!} </p>
  </div>

    @foreach ($post->comment as $comment)
    

 <div class="panel panel-default">
  <div class="panel-heading">
  <img src="{{Storage::url(''.$comment->user->avatar)}}" style="width: 30px; height: 30px; border: 3px #fff solid; border-radius: 50%; margin: 0 auto;" > Reply by <strong>{{ $comment->user->name}}</strong> on {{ $post->created_at->toDayDateTimeString()}}  
</div>

<div class="panel-body">
    <p> {{ $comment->comment}}</p>
</div>
</div>
    @endforeach
</div>


</div>


@stop