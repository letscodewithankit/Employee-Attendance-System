<?php

namespace App\Http\Controllers\EmployeeController;

use App\Http\Controllers\Controller;
use App\Models\AttendanceDetailsModel;
use App\Models\AttendanceModel;
use App\Models\Employee;
use App\Models\MonthModel;
use App\Models\YearModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }
   public function dashboard_page()
   {

     $user=Auth::guard('employee')->user();
      return view('EmployeeView.dashboard',compact('user'));
   }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/employee_login');
    }
   public function store(Request $request,$id)
   {

       if ($request->image==null)
       {
           return redirect()->back()->withErrors(['msg'=>"Invalid"]);
       }

      $img=$request->image;
      $image_parts = explode(";base64,", $img);
      $image_base64 = base64_decode($image_parts[1]);
       $filename=uniqid().'.png';
       $result=file_put_contents('uploads/image/'.$filename,$image_base64);


       $present_year = date('Y');
       $present_month = date('m');
       $present_date=date('d');


       date_default_timezone_set("Asia/Calcutta");

       if ($id==1) {


           $data2 = new AttendanceDetailsModel();
           $data2->employee_id = Auth::guard()->user()->id;
           $data2->Check_In = date('h:i:sa');
           $data2->Check_Out = 0;
           $data2->Check_In_Pic = $filename;
           $data2->Check_Out_Pic = 0;
           $data2->save();

           $last_id = $data2->id;


           $data = new AttendanceModel();

           $month = MonthModel::where('id', '=', $present_month)->get();

           $year = YearModel::where('title', '=', $present_year)->get();


           $data->month_id = $month[0]->id;
           $data->year_id = $year[0]->id;
           $data->day = date('d');
           $data->employee_id = Auth::guard()->user()->id;
           $data->atten_detail_id=$last_id;
           $data->status = "1";
           $data->save();


       }
       else

       {
           $emp_id=Auth::guard()->user()->id;$month_id=idate("m");
           $data3=AttendanceModel::where(['employee_id'=>$emp_id,'day'=>$present_date,'month_id'=>$month_id])->first();
           $ide=$data3->atten_detail_id;
           $data4=AttendanceDetailsModel::find($ide);
           $data4->Check_Out=date('h:i:sa');
           $data4->Check_Out_Pic=$filename;
           $data4->save();

       }




       return redirect(route('employee_dashboard'));

   }
   public function webcame($id)
   {
       $emp_id=Auth::guard()->user()->id;$month_id=idate("m");$present_date=date('d');
       $data=AttendanceModel::where(['employee_id'=>$emp_id,'day'=>$present_date,'month_id'=>$month_id])->first();
       if (($data==null)&&($id==1))
       {
           return view('EmployeeView.webcam',compact('id'));
       }

       else if (($data==null)&&($id==2))
       {
           return redirect()->back()->withErrors(['msg' => 'Todays check-in is not done,so you are not allowed to check-out']);
       }
       else if((($data!=null)&&($id==1))||(($data!=null)&&($id==2)&&($data->get_details->Check_Out!=0)))
       {
          return redirect()->back()->withErrors(['msg' => 'Todays check-in is done,so you are not allowed to check-in again']);
       }

       else if(($data->get_details->Check_Out==0)&&($id==2))
       {
           return view('EmployeeView.webcam',compact('id'));
       }



   }

   public function view()
   {
       $emp_id=Auth::guard()->user()->id;
       $data=AttendanceModel::where('employee_id','=',$emp_id)->get();

       return view('EmployeeView.ViewTable',compact('data'));
   }
   public function profile()
   {
       $id=Auth::guard()->user()->id;
       $data=Employee::where('id','=',$id)->first();


       return view('EmployeeView.profile_update',compact('data'));
   }

   public function profile_update(Request $request)
   {

       $data=Employee::where('id','=',Auth::guard()->user()->id)->first();


       if($request->file('imagee')){
           $file= $request->file('imagee');
           $filename= uniqid().$file->getClientOriginalName();

           $file-> move(public_path('uploads/image'), $filename);
           $data->photo=$filename;
           $data->save();
       }
       return redirect(route('profile_view'));
   }
}
