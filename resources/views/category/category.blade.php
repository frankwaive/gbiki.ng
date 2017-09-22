@extends ('layouts.app')
@section ('PageTitle')
Welcome to Gbiki
@stop


@section ('content')

  <div class="container">
    @foreach ($posts as $post)

    <div class="panel panel-default">
    <div class="panel-heading">

      

  <a href="/post/{{$post->slug}}"><h4>{{ $post->post_title }}</h4></a>

  <div class="meta">
  by <strong>{{ $post->user->name}}</strong> on {{ $post->created_at->toDayDateTimeString()}} 
</div>
 
    </div>

    <div class="panel-body">
      <p>{{ $post->post_content}}</p>
    </div>


  </div>
     @endforeach


  </div>

@stop
