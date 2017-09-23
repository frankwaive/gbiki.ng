@extends ('layouts.app')
@section ('PageTitle')
Welcome to Gbiki
@stop


@section ('content')

  <div class="container">
    @foreach ($posts as $post)

    <div class="panel panel-default">
    <div class="panel-heading">

      

  <a href="{{url('/post/'. $post->slug)}}"><h4>{{ $post->post_title }}</h4></a>

  <div class="meta">
  by <strong><a href="{{url('/')}}/profile/{{ $post->user->slug }}">{{ $post->user->name}}</a></strong> on {{ $post->created_at->toDayDateTimeString()}} 
</div>
 
    </div>

    <div class="panel-body">
      <?php $body = strip_tags($post->post_content); ?>
      <p>{!! \Illuminate\Support\Str::words(  $body,55,'....')  !!}</p>
    </div>


  </div>
     @endforeach


  </div>

@stop
