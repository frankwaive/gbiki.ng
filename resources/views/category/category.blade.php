@extends ('layouts.app')
@section ('PageTitle')
Welcome to Gbiki
@stop


@section ('content')

  <div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{ $categories->category_name }}</h2></div>

                <div class="panel-body">
                    

                    @foreach ($posts as $post)
                    @if(!empty($post->featured_img))
                     <div id="onome" class="row">
                         <div class="col-md-3">
                            <img src="{{asset('storage/'.$post->featured_img)}}" width="100%" height="auto" />      
                            </div>
                        <div class="col-md-9">
                            <a href="{{url('/post/'. $post->slug)}}"><h3>{{ $post->post_title }}</h3></a>
                            <div class="meta">
                              by <strong><a href="{{url('/')}}/profile/{{ $post->user->slug }}">{{ $post->user->name}}</a></strong> {{ $post->created_at->toDayDateTimeString()}} <span class="fa fa-comment"></span>  {{ $post->comment()->count() }} comments</span>
                            </div>
                            <?php $body = strip_tags($post->post_content); ?>
                            <p> {!! \Illuminate\Support\Str::words( $body,35,'....')  !!}</p>
                        </div>
                    </div>
                    @else
                     <div id="onome" class="row">
                        
                        <div class="front">
                            <a href="{{url('/post/'. $post->slug)}}"><h3>{{ $post->post_title }}</h3></a>
                            <div class="meta">
                              by <strong><a href="{{url('/')}}/profile/{{ $post->user->slug }}">{{ $post->user->name}}</a></strong> {{ $post->created_at->toDayDateTimeString()}}
                            </div>
                            <?php $body = strip_tags($post->post_content); 
                            ?>
                            <p> {!! \Illuminate\Support\Str::words( $body,55,'...')  !!}</p>
                        </div>
                    </div>


                    @endif

                    @endforeach

                    {{ $posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

     

@stop
