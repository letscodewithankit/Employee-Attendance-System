<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\Driver\Monitoring\removeSubscriber;
use function Termwind\renderUsing;

class AdminLoginController extends Controller
{
    public function admin_login_page()
    {
        return view('AdminView.Admin_login_page');
    }

    public function admin_login_authenticate(Request $request)
    {

          $request->validate([
               'email'=>'required',
               'password'=>'required',
          ]);

          if (Auth::guard('admin')->attempt(
             ['email'=>$request->email,
              'password'=>$request->password,
                 ]
          ))
          {
             return redirect(route('dashboardview'));
          }
          return "data failed";
    }

     public function __construct()
    {
       $this->middleware('guest:admin');
    }

}
