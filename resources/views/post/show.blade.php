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
<img src="{{asset('storage/'.$post->user->avatar)}}" style="width: 80px; height: 80px; border: 3px #fff solid; border-radius: 50%; margin: 0 20px 0 0;" >
</div>

<div class="left">
  <h3>{{ $post->post_title }}</h3> 

  by <strong>{{ $post->user->name}}</strong> on {{ $post->created_at->toDayDateTimeString()}} 

 </div>
  </div>
   </div>

  <div class="panel-body">
    



@if (File::exists(asset('storage/'.$post->featured_img)))
    <img src="{{ asset('storage/'. $post->featured_img) }}" alt="{{ $post->title }}" />
@else 
   !!
@endif






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






@if (Auth::guest())

<p> Existing user? Login to comment. New User? Register to comment </p>

 @else
<script>tinymce.init({ selector:'textarea' });</script>
<div class="row">
    <div id="comment-form" class="" style="margin-top: 25px;">
      {{ Form::open(['route' => ['comment.store', $post->id], 'method' => 'POST']) }}

        <div class="row">
 

          <div class="col-md-12">
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
  </div>
@endif

@stop