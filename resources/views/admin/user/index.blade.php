@extends('layouts.master')

@section('body')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3>{{ $users->total() }} Total Users</h3>
		<b>In this page ({{ $users->count() }} users) </b>
		<ul class="list-group">
			@forelse($users as $user)
				<li class="list-group-item" style="margin-top: 20px;">
					<span>
						{{ $user->name }}
					</span>
					<span class="pull-right clearfix">
						Joined ({{ $user->created_at->diffForHumans() }})
						<button class="btn btn-xs btn-primary">Follow</button>
					</span>
				</li>
			@empty
				<p>No data available</p>
			@endforelse

			{{ $users->links() }}
		</ul>
	</div>
</div>

@endsection