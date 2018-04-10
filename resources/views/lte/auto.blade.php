@extends('layouts.lte')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <input type="text" value="hungnv" placeholder="type to search" class="form-control" id="auto-completed">
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/lte/index.js')}}"></script>
@endsection