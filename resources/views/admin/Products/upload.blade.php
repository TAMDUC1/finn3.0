@extends('admin.layout')

@section('before_style')
    <link rel="stylesheet" href="{{asset('css/backend_css/fullcalendar.css')}}" />
    <link href="{{asset('fonts/backend_fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/backend_css/jquery.gritter.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/uploadProducts.css')}}" />

@endsection
@section('main')
    @include('ckfinder::setup')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb" style="padding: 10px"> <i class="icon-home"></i>Upload Products</div>
        </div>
        <div class="UploadForm">
                <div class="FormWrapper">
                    <form method="post" action="{{route('upload')}}">
                        {{csrf_field()}}
                            <label for="">Product</label>
                            <input class="form-control" type="text" name="name">
                            <label for="">Content</label>
                            <input type="text" name="content">
                            <label for="">Price</label>
                            <input type="text" name="price">
                            <label for="">Amount</label>
                            <input type="text" name="amount">
                            <label for="">Categories</label>
                            <input type="text" name="slug">
                            <label for="">Status</label>
                            <input type="text" name="status">


                            <button type="submit" class="btn btn-success" style="border-radius: 5px">Upload</button>
                    </form>
                </div>
                <textarea name="content" id="editor">
                                &lt;p&gt;This is some sample content.&lt;/p&gt;
                            </textarea>
            <div style="display:grid">
                    <div class="upload-btn-wrapper">
                        <img id="blah" src="{{url('/images/backend_images/logo.png')}}" alt="your image" />
                        <div class="upload-image" style="position: relative">
                            <button class="btn btn-warning">Upload a image</button>
                            <input type="file" name="myfile" onchange="readURL(this);"  />
                        </div>

                    </div>
                </div>
            <div>
            </div>
            </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript" language="javascript" src="{{asset('/ckeditor5-build-classic/ckeditor.js')}}"></script>
    <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
    <script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                }
            } )
            .catch( error => {
            console.error( error );
        } );

    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@endsection