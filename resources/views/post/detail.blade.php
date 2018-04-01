@extends('layouts.lte')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Post</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content</label>
                            <input type="hidden" value="{{$post->id or ''}}" id="id">
                            <input type="hidden" value="{{isset($post->id)?'U':'A'}}" id="mode">
                            <input type="text" class="form-control" value="{{$post->content or ''}}" id="content">
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-12" style="padding: 0px;">
                                <label for="exampleInputEmail1">Comments</label>
                            </div>

                            <div class="col-md-10" style="padding: 0px;">
                                <table class="table table table-bordered table-hover" id="comments">
                                    <thead>
                                    <tr>
                                        <th>Content</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($post))

                                        @foreach($post->comments as $comment)
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="comment_id" value="{{$comment->id}}">
                                                    <input type="text" value="{{$comment->content or ''}}" class="form-control comment_content">
                                                </td>
                                                <td class="text-center">
                                                    @include('controls.btn-remove')
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-info btn-sm" id="btn-add"><span
                                            class="glyphicon glyphicon-plus"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <button type="button" id="btn-save" class="btn btn-primary btn-sm"><span
                                    class="glyphicon glyphicon-floppy-disk"></span></button>
                    </div>
            </div>


        </div>
    </div>

    <div class="" style="display: none">
        <table class="table table table-bordered table-hover" id="tmp">
            <tbody>
            <tr>
                <th>Content</th>
                <th class="text-center">Action</th>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control comment_content">
                    <input type="hidden" class="form-control comment_id">
                </td>
                <td class="text-center">
                    @include('controls.btn-remove')
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="{{asset("/js/lte/post.detail.js")}}"></script>
@endsection