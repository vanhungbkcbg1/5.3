@extends('layouts.lte')

@section('content')
    <div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control email" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Only number</label>
                        <input type="text" class="form-control number" maxlength="9" id="exampleInputPassword1"
                               placeholder="enter only number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">decimal setting real-len and decimal_len</label>
                        <input type="text" class="form-control decimal" real_len="5" decimal_len="1"
                               id="exampleInputPassword1" placeholder="enter only number">
                    </div>

                    <div class="form-group">
                        <label>Date:</label>

                        <div class="input-group date">

                            <input type="text" class="form-control pull-left datepicker" id="mydate">
                            <div class="input-group-addon input-group-addon-date">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label>Date:</label>

                        <div class="input-group date">

                            <input type="text" class="form-control pull-left datepicker required" id="mydate1">
                            <div class="input-group-addon input-group-addon-date">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="gender" value="1">Choose
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" checked value="1" name="optradio">Option 1</label>
                        <label class="radio-inline"><input type="radio" value="2" name="optradio">Option 2</label>
                        <label class="radio-inline"><input type="radio" value="3" name="optradio">Option 3</label>
                    </div>

                    <div class="form-group">
                        <label>Select:</label>
                        <select id="my-select" class="form-control">
                            <option value="0"></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Result Get data:</label>
                        <textarea id="result" class="form-control" rows="10"></textarea>
                    </div>


                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" id="btn-submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


    </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset("/js/lte/control.js")}}"></script>
@endsection