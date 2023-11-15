@extends('EmployeeView.Masters.Main')
@section('content')
<!DOCTYPE html>
<html>
<body>
<style>
    body{
        background-color:black;
        color:#69707a;
    }
    .img-account-profile {
        height: 10rem;
    }
    .rounded-circle {
        border-radius: 50% !important;
    }
    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }
    .card .card-header {
        font-weight: 500;
    }
    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }
    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }
    .form-control, .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }
    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>
<head>

</head>
<div class="container-xl px-4 mt-4" >

    <!-- Account page navigation-->
    <div id="pp" style="margin-top:6%">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header" type="file">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" style="width: 250px;height: 200px" src="{{url('/uploads/image/'.$data->photo)}}" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <form method="post" action="{{route('pro_update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="imagee"  id="imagee" class="form-control"><br><br>
                            <button class="btn btn-primary" type="submit">Upload new image</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8" id="ppqqwer">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">

                        <form method="get" action="#" >
                            @csrf
                            <div class="mb-3">
                                <label class="small mb-1" for="full_name">Full Name</label>
                                <input class="form-control" id="full_name" name="name" type="text" placeholder="Enter your username" value="{{$data->emp_name}}">
                            </div>

                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div  class="container-xl px-4 mt-4" style="display: none" id="password" >
    <div class="col-xl-8" id="ppqqwer">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account Details</div>
            <div class="card-body">
                <form method="get" action="#">
                    <!-- Form Group (username)-->

                    <div class="mb-3">
                        <label class="small mb-1" for="full_name">Full Name</label>
                        <input class="form-control" id="full_name" name="name" type="text" placeholder="Enter your username" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                    </div>

                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                        <input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Enter your email address" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputPhone">Phone number</label>
                            <input class="form-control" id="inputPhone" name="mobile_number" type="tel" placeholder="Enter your phone number" value="{{\Illuminate\Support\Facades\Auth::user()->mobile_number}}">
                        </div>

                    </div>
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="submit">Save changes</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</body>
</html>
@endsection
