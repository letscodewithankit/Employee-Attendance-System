@extends('EmployeeView.Masters.Main')
@section('content')
<!-- partial -->
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* CSS */
        .button-63 {
            align-items: center;
            background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
            border: 0;
            border-radius: 8px;
            box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
            box-sizing: border-box;
            color: #FFFFFF;
            display: flex;
            font-family: Phantomsans, sans-serif;
            font-size: 20px;
            justify-content: center;
            line-height: 1em;
            max-width: 200%;
            min-width: 200px;
            padding: 19px 24px;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            cursor: pointer;
        }

        .button-63:active,
        .button-63:hover {
            outline: 0;
        }


    </style>
</head>
<body style="background-color: black" >
<div class="main-panel">
    <div class="content-wrapper">
        @if($errors->any())
            <h4 style="color: red">{{$errors->first()}}</h4><br><br>
        @endif
        <div class="row1" >
            <div class="col-8 grid-margin stretch-card">
               <a style="text-decoration: none" href="{{route('webcam_page',"1")}}"> <button id="check_in" name="1" class="button-63"  role="button">CHECK IN</button></a>
            </div>
        </div>
        <div class="row2" >
            <div class="col-4 grid-margin stretch-card">
                <a style="text-decoration: none" href="{{route('webcam_page',"2")}}">  <button  id="check_out" class="button-63" name="2" role="button">CHECK OUT</button></a>
                </div>
            </div>
        </div>




</div>
</body>

@endsection
