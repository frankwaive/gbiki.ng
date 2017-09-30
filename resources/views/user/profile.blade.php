@extends ('layouts.app')
@section ('PageTitle')
{{ $user->name }} || Gbiki
@stop

@section ('content')

<div class="container">

 </div>
 <div class="">
 	        <div id="login-holder">
 	        	<div class="row profile-top">
                      <div class="col-md-3 col-xs-12"> <div style="width: 200px; height: 200px; border: 5px #fff solid; border-radius: 50%; background:url('{{Storage::url(''.$user->avatar)}}'); background-size: cover; margin: 0 auto;""> </div></div>



                    <div class=" tim col-md-9 col-xs-12">

                      <h1>{{ $user->name}}</h1>
                      <p>Joined on {{ $user->created_at->toDayDateTimeString()}} <span class="comments-title"><span class="fa fa-comment"></span>  {{ $user->post()->count() }} Posts</span> <span class="fa fa-comment"></span>  {{ $user->comment()->count() }} comments</span>






@if (Auth::User()->isFollowing($user->id))
    
        <form action="{{url('unfollow/' . $user->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-follow-{{ $user->target_id }}" class="btn btn-danger">
            <i class="fa fa-btn fa-trash"></i>Unfollow
            </button>
        </form>
    
@else
    
        <form action="{{url('follow/' . $user->id)}}" method="POST">
            {{ csrf_field() }}

            <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-success">
            <i class="fa fa-btn fa-user"></i>Follow
            </button>
        </form>
    
@endif














                    </div>
            </div>
   </div>
<div class="container profilepage">


<div class="panel panel-default">
                <div class="panel-heading"><h2>Posts by {{ $user->name}}</h2></div>

                <div class="panel-body">
                    

                    @foreach ($post as $post)



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
                              by <strong><a href="{{url('/')}}/profile/{{ $post->user->slug }}">{{ $post->user->name}}</a></strong> {{ $post->created_at->toDayDateTimeString()}} <span class="fa fa-comment"></span>  {{ $post->comment()->count() }} comments</span>
                            </div>
                            <?php $body = strip_tags($post->post_content); 
                            ?>
                            <p> {!! \Illuminate\Support\Str::words( $body,55,'...')  !!}</p>
                        </div>
                    </div>


                    @endif

                    @if(empty($post->post_content))

                    <h2> {{ $user->name}} has not posted anything yet! </h2>
                    @endif


                    @endforeach

                    
                    
                </div>
            </div>
        </div>



@endsection