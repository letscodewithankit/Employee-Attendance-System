@extends('EmployeeView.Masters.Main')
@section('content')
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    </head>
    <body style="background: black">
    @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please take snapshot',
            })
        </script>
    @endif
    <br><br>
<div style="margin-top: 10%;background-color: black">
            <form method="POST" action="{{route('webcam',$id)}}">
                @csrf
                <div class="row" >
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <br/>
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                        <input type="hidden" name="image" class="image-tag">
                    </div>
                    <div class="col-md-6">
                        <div style="color: greenyellow" id="results" type="file" name="imagee">Your captured image will appear here...</div>
                    </div>
                    <div class="col-md-12 text-center">
                        <br/>
                        <button id="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
</div>
    </body>
            <script language="JavaScript">
                Webcam.set({
                    width: 490,
                    height: 350,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                });

                Webcam.attach( '#my_camera' );

                function take_snapshot() {
                    Webcam.snap( function(data_uri) {
                        $(".image-tag").val(data_uri);
                        console.log(data_uri);
                        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
                    } );
                }
            </script>
@endsection
