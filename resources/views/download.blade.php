@extends('layouts.app')

@section('content')
	<img src="data:image/jpg;base64,<?php echo base64_encode($output);?>">
@endsection

@section('javascript')
    <script src="{{asset('/js/home/home.js')}}"></script>
@endsection
