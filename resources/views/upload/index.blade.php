@extends('layouts.app')

@section('content')
    <form action="/upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        Product name:
        <br/>
        <input type="text" name="name"/>
        <br/><br/>
        Product photos (can attach more than one):
        <br/>
        <input type="file" name="photos"/>
        <br/><br/>
        <input type="submit" value="Upload"/>
    </form>
@endsection

@section('javascript')

    <script>
        var str = "Visit W3Schools. Hello ‚  ‚¦ ‚· ‚¶!";
        var patt1 = /[\u3042-\u3048\u3058-\u3059]/g;
        var result = str.match(patt1);
        console.log(result);
    </script>
@endsection


