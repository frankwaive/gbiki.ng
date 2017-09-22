@extends ('layouts.app')
@section ('PageTitle')
Creat a new post || Gbiki 
@stop


<script>tinymce.init({ selector:'textarea' });</script>


@section ('content')

<div id="Create-post" class="container">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
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
			{!! Form::open(array('route' => 'post.store', 'data-parsley-validate' => '', 'files' => true)) !!}
				{{ Form::label('post_title', 'Title:') }}
				{{ Form::text('post_title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}


				{{ Form::label('category_id', 'Category:') }}
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						<option value='{{ $category->id }}'>{{ $category->category_name }}</option>
					@endforeach

				</select>


	

				{{ Form::label('featured_img', 'Upload a Featured Image') }}
				{{ Form::file('featured_img') }}

				{{ Form::label('post_content', "Post Body:") }}
				{{ Form::textarea('post_content', null, array('class' => 'form-control')) }}

				{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
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






