@extends('layouts.master')

@section('title')
	Image Upload
@endsection

@section('body')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Image</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action='{{ url("image/imageUpload") }}'>
                        {{ csrf_field() }}
                        <div class="form-grup">
                            <label for="image" class="col-md-4 control-label">Upload image</label>
                            <div class="col-md-6">
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="form-grup">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection