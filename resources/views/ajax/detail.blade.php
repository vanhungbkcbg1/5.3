@extends('layouts.app')

@section('content')

    <style rel="stylesheet">
        .btn-delete{
            color: white;
            background-color: #d9534f;
            border-color: #d43f3a;
        }
        .btn-delete:focus{
            background-color: #c9302c;
            border-color: #761c19;
        }
        .btn-delete:hover{
            background-color: #c9302c;
            border-color: #ac2925;
            cursor: pointer;
        }
    </style>

    <div class="col-md-3">
        test
    </div>
    <div class="col-md-3 upload-group">
        <div class="input-group ">
            <input type="text"  readonly class="form-control choose_file" placeholder="Choose file" aria-describedby="basic-addon2">
            <span class="input-group-addon btn-delete" >Delete</span>
            <input type="file" style="display: none" class="input-file" accept="image/*" placeholder="file">
        </div>
        <div>
            <img src="" class="preview_image" style="display: none" width="200" height="200">
        </div>
    </div>

    <div class="col-md-3 upload-group">
        <div class="input-group ">
            <input type="text"  readonly class="form-control choose_file" placeholder="Choose file" aria-describedby="basic-addon2">
            <span class="input-group-addon btn-delete" >Delete</span>
            <input type="file" style="display: none" class="input-file" placeholder="file">
        </div>
        <div>
            <img src="" class="preview_image" style="display: none" width="200" height="200">
        </div>
    </div>



@endsection

@section('javascript')

    <script>
        $(document).ready(function () {

            $(document).on('change','.upload-group .input-file', function (event) {

                if(this.files && this.files[0].type.indexOf('image')!=-1){

                    UploadCore.filePreview(this);
                    UploadCore.uploadFile(this);
                }else{
                    alert('invalid');
                }

            });

            $(document).on('click','.upload-group .choose_file', function () {

                $(this).closest('.upload-group').find('.input-file').trigger('click');
            });

            $(document).on('click','.upload-group .btn-delete', function () {

                $(this).closest('.upload-group').find('.choose_file').val('');
                $(this).closest('.upload-group').find('.input-file').val('');
            });
        });

        var UploadCore={
            filePreview: function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $(input).closest('.upload-group').find('.preview_image').attr('src', e.target.result).fadeIn(400);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            },
            uploadFile: function (input) {
                if (input.files && input.files[0]) {
                    var formData = new FormData();
                    formData.append('file', input.files[0]);
                    $.ajax({
                        url : '/ajax/upload',
                        type : 'POST',
                        data : formData,
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,  // tell jQuery not to set contentType
                        success : function(data) {
                            $(input).closest('.upload-group').find('.choose_file').val(data);
                        }
                    });
                }
            }
        };


    </script>
@endsection


