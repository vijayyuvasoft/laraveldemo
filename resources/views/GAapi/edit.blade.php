@extends ("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<h1>Enter Google Analytics API Key</h1>


    {{ Form::model($credentials, ['method' => 'PUT', 'route' => ['google-analytics-credentials.update', $credentials->setting_name]]) }}

		<div class="form-group">
        
		{{ Form::label("api_key","API Key") }}

		{{ Form::text("api_key",Input::old("api_key"),array("class"=>"form_control")) }}

		</div>

		<div class="form-group">

			{{ Form::submit("Save",array("class"=>"btn btn-primary")) }}
		
		</div>

		{{ Form::close() }}
	</div>
</div>
@endsection