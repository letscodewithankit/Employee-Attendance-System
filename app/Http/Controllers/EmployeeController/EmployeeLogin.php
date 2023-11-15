<?php

namespace App\Http\Controllers\EmployeeController;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeLogin extends Controller
{
    public function login_page()
    {
        return view('EmployeeView.EmployeeLogin');
    }
    public function store(Request $request)
    {

        $request->validate([
            'id'=>'required',
            'password'=>'required',
        ]);

        if (Auth::guard('employee')->attempt([
                'emp_id'=>$request->id,
                'password'=>$request->password,]
        ))
            {
                return redirect(route('employee_dashboard'));
            }
        return "data failed";
    }

    public function __construct()
    {
        $this->middleware('guest:employee');
    }

    public function logout()
    {
//        public function logout(Request $request)
//    {
//        $this->guard()->logout();
//
//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();
//
//        if ($response = $this->loggedOut($request)) {
//            return $response;
//        }
//
//        return $request->wantsJson()
//            ? new JsonResponse([], 204)
//            : redirect('/');
//    }
    }


}
