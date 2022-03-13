<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Booking;
use App\Models\Career;
use App\Models\Consulting;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\Feed;
use App\Models\Job;
use App\Models\Office;
use App\Models\Order;
use App\Models\Page;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Slider;
use App\Models\News;
use App\Models\Lawyer;
use App\Models\Newsletters;
// use App\Models\Social;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function __construct()
    {
        if (\auth()->check()) {
            $this->middleware('permission:show_home', ['only' => 'index']);
        }
    }

    public function getLogin()
    {
        if (Auth::Check()) {
            return redirect('admin');
        }
        return view('admin.home.login');
    }

    public function postLogin()
    {
        $inputs = Request()->all();

        $remember = false;
        if (isset($inputs['remember'])) {
            $remember = true;
        }
        $data = ['email' => $inputs['email'], 'password' => $inputs['password'],'status' => 1];
        if (Auth::attempt($data, $remember)) {
             if (Auth::user()->status == 1) {
            (new Action())->saveAction('Login to dashboard');
            return redirect()->intended('admin');

             } else {
                 Auth::logout();
                 return back()->withInput()->withError(trans('admin.not_allow'));
             }
        } else {
            return back()->withInput()->withError(trans('admin.wrong_login'));
        }
    }
    public function logout()
    {
        $action = new Action();
        $action->saveAction('Logout from admin dashboard');

        Auth::logout();
        return redirect('/');
    }
    public function index()
    {
        // $social_media = Social::count();
        $log = Action::count();
        $roles = Role::count();
        $admins = User::where('status', 1)->count();
        return view('admin.home.index', compact( 'log', 'admins', 'roles'));
    }
    public function edit_active($type, $id)
    {

        if ($type == 'slider') {
            $slider = Slider::find($id);
            if ($slider['active'] == 'yes') {
                $slider->active = 'no';
            } elseif ($slider['active'] == 'no') {
                $slider->active = 'yes';
            }
            $slider->save();
            $message = 'Edit Activation of slider ';
        } elseif ($type == 'admins') {
            $admin = User::find($id);
            if ($admin['status'] == 1) {
                $admin->status = 0;
            } elseif ($admin['status'] == 0) {
                $admin->status = 1;
            }
            $admin->save();
            $message = 'Edit Activation of supervisor ';
        }

        $action = new Action();
        $action->saveAction($message);

        $data['status'] = 1;
        $data['message'] = trans('admin.edit_suc');
        return response()->json($data);
    }

}
