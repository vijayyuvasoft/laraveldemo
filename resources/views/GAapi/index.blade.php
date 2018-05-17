@extends ("layouts.app")

@section("content")
	<div class="container">
		<div class="row">
			@if(Session::has('message'))

			<div class="alert alert-info">{{ Session::get('message') }}</div>

			@endif
			<h1>Google Analytics Credentials</h1>
			<strong>API Key : </strong>{{ $credentials->setting_value }}
			<a class="btn btn-primary" href="{{ URL::to('/google-analytics-credentials/google_analytics_key/edit') }}">Update Key</a>
		</div>		
	</div>	
@endsection