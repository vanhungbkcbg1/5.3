@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-default" id="btn-search">Test</button>
                            <button type="button" class="btn btn-default" id="btn-error">Error</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{asset('/js/home/home.js')}}"></script>
@endsection
