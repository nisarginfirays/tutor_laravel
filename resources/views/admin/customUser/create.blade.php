@extends('layouts.master')

@section('title')
	Create-Custom User
@endsection

@section('body')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                <div class="panel-heading">Create Custom User</div>
                <div class="panel-body">
                	@if (session('success'))
					    <div class="alert alert-success">
					        {{ session('success') }}
					    </div>
					@endif
	                <form class="form-horizontal" role="form" method="POST" action="{{ isset($post_data) ? url('customUser/update/'.$post_data->id) : url('customUser/create') }} ">
	                	{{ csrf_field() }}
                        {{ method_field('patch') }}
	                	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Content</label>

                            <div class="col-md-6">
                                <textarea id="content" name="content" required autofocus> {{ isset($post_data) ? $post_data->content : old('content') }} </textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create User
                                </button>
                            </div>
                        </div>
	                </form>
               	</div>
            </div>
		</div>
	</div>
@endsection