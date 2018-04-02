@extends('layouts.lte')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Student Info</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="hidden" value="{{$student->id or ''}}" id="id">
                            <input type="hidden" value="{{isset($student->id)?'U':'A'}}" id="mode">
                            <input type="text" class="form-control" value="{{$student->name or ''}}" id="name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" value="{{$student->address or ''}}" id="address">
                        </div>

                        <div class="form-group">
                            <label>Date Of Birth</label>

                            <div class="input-group date">

                                <input type="text" value="{{isset($student->date_of_birth)?$student->date_of_birth->format('Y/m/d'):''}}" class="form-control pull-left datepicker" id="date_of_birth">
                                <div class="input-group-addon input-group-addon-date">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Grade</label>
                            <select class="form-control" id="grade_id">
                                <option value="0"></option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}" {{isset($student ) && $student->grade_id==$grade->id?'selected':''}}>{{$grade->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="box-footer text-right">
                        <button type="button" id="btn-save" class="btn btn-primary btn-sm"><span
                                    class="glyphicon glyphicon-floppy-disk"></span></button>
                    </div>
            </div>


        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset("/js/student/student.detail.js")}}"></script>
@endsection