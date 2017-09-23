@extends('layouts.app')
@section ('PageTitle')
Welcome to Gbiki
@stop
@section('content')

<?php $posts = \App\Post::all();
        $users = \App\User::get();
        ?>
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Gbiki</div>

                <div class="panel-body">
                    

                    @foreach ($posts as $post)
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <img src="{{asset('storage/'.$post->featured_img)}}" style="width: 80px; height: 80px; border: 3px #fff solid; border-radius: 50%; margin: 0 20px 0 0;" >
                        </div>
                        <div class="col-md-8">
                            <a href="{{url('/post/'. $post->slug)}}"><h4>{{ $post->post_title }}</h4></a>
                            <div class="meta">
                              by <strong><a href="{{url('/')}}/profile/{{ $post->user->slug }}">{{ $post->user->name}}</a></strong> {{ $post->created_at->toDayDateTimeString()}}
                            </div>
                            <?php $body = strip_tags($post->post_content); ?>
                            <p> {!! \Illuminate\Support\Str::words( $body,35,'....')  !!}</p>
                        </div>
                    </div>
                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
