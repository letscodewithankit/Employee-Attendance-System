@extends('EmployeeView.Masters.Main')
@section('content')
    <div class="row" style="margin-top: 10%">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Performance</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Check In Time</th>
                            <th>Check Out Time</th>
                            <th>Check Out Pic</th>
                            <th>Check In Pic</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data2)
                        <tr>
                            <td>{{$data2->day}} {{$data2->get_month->title}} {{$data2->get_year->title}}</td>
                            <td>{{$data2->get_details->Check_In}}</td>
                            @if($data2->get_details->Check_Out==0)
                            <td>Check out not done</td>
                            <td>Check out image not done</td>
                            @else
                            <td>{{$data2->get_details->Check_Out}}</td>
                            <td><img src="{{url('/uploads/image/')}}/{{$data2->get_details->Check_Out_Pic}}"></td>

                            @endif
                            <td><img src="{{url('/uploads/image/')}}/{{$data2->get_details->Check_In_Pic}}"></td>

                        </tr>
                        </tbody>
                        @endforeach


                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
