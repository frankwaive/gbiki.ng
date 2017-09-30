@extends ('layouts.app')
@section ('PageTitle')
Edit {{ $post->post_title }} || Gbiki 
@stop


	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>


@section ('content')

<div id="Create-post" class="container">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3>You are editing {{ $post->post_title }}</h3>
			<hr>

										@if ($errors->any())
							    <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
			{!! Form::model($post, ['route' => ['post.update',$post->id], 'files' => true, 'method' => 'PATCH']) !!}
				{{ Form::label('post_title', 'Title:') }}
				{{ Form::text('post_title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}


				{{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}


	

				{{ Form::label('featured_img', 'Upload a Featured Image') }}
				{{ Form::file('featured_img', array('class' => 'form-control')) }}

				{{ Form::label('post_content', "Post Body:", ['class' => 'form-spacing-top']) }}
				{{ Form::textarea('post_content', null, array('class' => 'form-control')) }}


				{{ Form::submit('Edit Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}


  <script>
        tinymce.init({
            selector: "#post_content",theme: "modern",width: 750,height: 300,
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

@endsection




</div>






