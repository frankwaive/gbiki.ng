@extends ('layout.main')
@section ('PageTitle')
Gbiki Posts
@stop


@section ('content')

<div class="container">




  @foreach ($posts as $post)

  <div class="panel panel-default">
  <div class="panel-heading">

<a href="{{url('/post/'. $post->slug)}}"><h4>{{ $post->post_title }}</h4></a>
<div class="meta">
  by <strong>{{ $post->user->name}}</strong> {{ $post->created_at->toDayDateTimeString()}}
</div>
  </div>

  <div class="panel-body">
    <p>{{ $post->post_content}}</p>
  </div>

</div>
   @endforeach


</div>





@stop
