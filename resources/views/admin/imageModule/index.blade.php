@extends('layouts.master')

@section('body')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>

@endsection