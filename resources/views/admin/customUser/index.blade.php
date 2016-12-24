@extends('layouts.master')

@section('body')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		@if(session('update'))
			<div class="alert alert-success">
				{{ session('update') }}
			</div>
		@endif
		<h3>{{ $data->total() }} Total User Content</h3>
		<b>In this page ({{ $data->count() }} content's) </b>
		<ul class="list-group">
			@forelse($data as $content)
				<li class="list-group-item" style="margin-top: 20px;">
					<span>
						{{ $content->content }}
					</span>
					<span class="pull-right clearfix">
						
						<a class="btn btn-xs btn-info" href='{{ URL::to("customUser/edit/$content->id") }}'>Edit</a>
						<a href='{{ URL::to("customUser/destroy/$content->id") }}' class="btn btn-xs btn-danger">Delete</a>

					</span>
				</li>
			@empty
				<p>No data available</p>
			@endforelse

			{{ $data->links() }}
		</ul>
	</div>
</div>

@endsection