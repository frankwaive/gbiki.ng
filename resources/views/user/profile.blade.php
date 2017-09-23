@extends ('layouts.app')
@section ('PageTitle')
{{ $user->name }} || Gbiki
@stop

@section ('content')

<div class="container">

  <div class="panel panel-default">
  	<div class="panel-heading">
    	<div class="container">
   			<div class="left">
			 <img src="{{asset('storage/'.$user->avatar)}}" style="width: 80px; height: 80px; border: 3px #fff solid; border-radius: 50%; margin: 0 20px 0 0;" >
			</div>

		<div class="left">
 		<h3>{{ $user->name }}</h3> 



		</div>
  	</div>
</div>


@endsection