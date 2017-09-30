@extends ('layouts.app')
@section ('PageTitle')
{{ $post->post_title }} || Gbiki
@stop


@section ('content')
<div class="container">

  <div class="panel panel-default">

  <div class="panel-heading">
 <div class="row">
                      <div class="user-avater col-md-4 col-xs-12 " style="width: 80px; height: 80px; border: 3px #fff solid; border-radius: 50%; background:url('{{Storage::url(''.$post->user->avatar)}}'); background-size: cover;""> </div>



                    <div class="col-md-8 col-xs-12 user-meta">
                      <h3>{{ $post->post_title }}</h3> 

                      by <strong><a href="{{url('/')}}/profile/{{ $post->user->slug }}">{{ $post->user->name}}</a></strong> on {{ $post->created_at->toDayDateTimeString()}} <span class="comments-title"><span class="fa fa-comment"></span>  {{ $post->comment()->count() }} Comments</span>


@if($post->user->id == Auth::user()->id)
    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>

@endif

                      </div>
   </div>
   </div>

  <div class="panel-body">

    <p>{!! $post->post_content !!} </p>
 

        @if(!empty($post->featured_img))
        <img src="{{asset('storage/'.$post->featured_img)}}" width="auto" max-width="100%" height="auto" />
      @endif

       </div>
     </div>



<h3 class="comments-title"><span class="fa fa-comment"></span>  {{ $post->comment()->count() }} Comments</h3>

    @foreach ($post->comment as $comment)
    

 <div class="panel panel-default">
  <div class="panel-heading">
 <div class="row">



                  <div class="col-md-4" style="width: 60px; height: 60px; border: 3px #fff solid; border-radius: 50%; background:url('{{Storage::url(''.$comment->user->avatar)}}'); background-size: cover; float: left;""> 
                  </div>



                  <div class="col-md-8">
                    <h4>Re - {{ $post->post_title }}</h4> 
                    comment by <strong><a href="{{url('/')}}/profile/{{ $comment->user->slug }}">{{ $comment->user->name}}</a></strong> on {{ $comment->created_at->toDayDateTimeString()}}
                  </div>
                          
                          
</div>
</div>

<div class="panel-body">
    <p> {!! $comment->comment !!}</p>
</div>
</div>

    @endforeach
</div>






@if (Auth::guest())

<p class="unreg"> Existing user? <a href="{{ url('/login') }}">Login</a> to comment. New User? <a href="{{ url('/register') }}">Register</a> to comment </p>

 @else
<script>tinymce.init({ selector:'textarea' });</script>
<div class="container">
    <div id="comment-form" style="margin-top: 25px;">
      {{ Form::open(array('action' => array('CommentController@store', $post->id, 'method' => 'POST'))) }}

        <div class="row">
 
                    @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

          <div class="container">
            {{ Form::hidden('post_id', $post->id) }}
            {{ Form::label('comment', "Comment:") }}
            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

            {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin:15px 0;']) }}
          </div>
        </div>

      {{ Form::close() }}



  <script>
        tinymce.init({
            selector: "#comment",theme: "modern",width: 750,height: 300,
            plugins: [
            "advlist autolink link lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code ",
            image_advtab: true 
        });
    </script>






    
  </div>
  </div>
@endif

@stop