
    <link rel="stylesheet" href="{{ asset('assets/dropzone_1/dropzone.min.css') }}">
    <script src="{{ asset('assets/dropzone_1/jquery.js')}}"></script>
    <script src="{{ asset('assets/dropzone_1/dropzone.min.js')}}"></script>


        <div class="col-md-12">
            {{-- <h1>آپلود تصویر پروفایل</h1> --}}

 {{-- {!! Form::open([ 'route' => [ 'dropzone.storestu' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!} --}}


<form method="POST" action="{{url('dropzone/image/upload/store/test')}}" enctype="multipart/form-data"
class="dropzone"
 id="image-upload"
>
@csrf
             <div>
                <h3>برای آپلود تصویر پروفایل کلیک نمایید</h3>
            </div>

</form>
        </div>

