@extends('layouts.lte')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Search Condition</h3>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content</label>
                            <input type="text" name="content" value="{{$content or ''}}" class="form-control " id="post_content">
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <button type="submit" id="btn-submit" class="btn btn-primary btn-sm"><span
                                    class="glyphicon glyphicon-search"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Posts</h3>
                    <div class="box-tools">
                        @include('controls.btn-add',array('url'=>"/adminlte/post/detail"))
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding ">
                    <table class="table table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th class="text-center" style="min-width: 100px;max-width: 100px;">Created Date</th>
                            <th>Content</th>
                            <th class="text-center" style="min-width: 150px;max-width: 150px;width: 150px;">Action</th>
                        </tr>
                        @foreach($posts as $post)

                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->user->name}}</td>
                                <td class="text-center" style="min-width: 100px;max-width: 100px;width: 100px;">{{$post->created_at->format('Y/m/d')}}</td>
                                <td>{{$post->content}}</td>
                                <td class="text-center">

                                    @include('controls.btn-edit',['url'=>"/adminlte/post/detail/".$post->id])
                                    @include('controls.btn-delete',['url'=>"/adminlte/post/detail/".$post->id])
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{--<ul class="pagination pagination-sm no-margin pull-right">--}}
                    {{--<li><a href="#">«</a></li>--}}
                    {{--<li><a href="#">1</a></li>--}}
                    {{--<li><a href="#">2</a></li>--}}
                    {{--<li><a href="#">3</a></li>--}}
                    {{--<li><a href="#">»</a></li>--}}
                    {{--</ul>--}}
                    @if(!empty($content))
                        {{ $posts->appends(array('content'=>$content))->links() }}
                    @else
                        {{ $posts->links() }}
                    @endif

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection