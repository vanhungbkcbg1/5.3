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
                            <label for="exampleInputEmail1">Name</label>
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
                    <h3 class="box-title">Students</h3>
                    <div class="box-tools">
                        @include('controls.btn-add',array('url'=>"/student/detail"))
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding ">
                    <table class="table table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            {{--<th class="text-center" style="min-width: 100px;max-width: 100px;">Created Date</th>--}}
                            <th>Address</th>
                            <th>Grade</th>
                            <th class="text-center" style="min-width: 150px;max-width: 150px;width: 150px;">Action</th>
                        </tr>
                        @foreach($students as $student)

                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->address}}</td>
                                <td>{{$student->grade->name}}</td>
                                <td class="text-center">

                                    @include('controls.btn-edit',['url'=>"/student/detail/".$student->id])
                                    @include('controls.btn-delete',['url'=>"/student/detail/".$student->id])
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
                        {{ $students->appends(array('content'=>$content))->links() }}
                    @else
                        {{ $students->links() }}
                    @endif

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection