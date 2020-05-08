<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();

            $adminCount =Admin::where([
                'username' =>$data['username'],
                'password' =>md5($data['password']) ,
                'status' =>1
            ])->count();


            if($adminCount > 0){
                Session::put('adminSession',$data['username']);
                return redirect()->to('/admin/dashboard');
            }else{
                return redirect('/admin')->with('message','Invalid Username or Password ');

            }

        }


        return view('admin.admin_login');
    }

    public function dashboard(){
        /*if (Session::has('adminSession')){
            //Perform all dashboard task

        }
        else{
            return redirect('/admin')->with('message','Please login to access');
        }*/
        return view('admin.dashboard');
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('message','Your are successfully logged out');
    }

    public function setting(){
        return view('admin.setting');
    }

    public function chkPassword(Request $request){
        $data = $request->all();

        $adminCount =Admin::where([
            'username' => Session::get('adminSession'),
            'password' =>md5($data['current_pwd'])
        ])->count();

        if($adminCount == 1){
            echo "true"; die;
        }
        else{
            echo  "false"; die;
        }

    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $adminCount =Admin::where([
                'username' => Session::get('adminSession'),
                'password' =>md5($data['current_pwd'])
            ])->count();

            if($adminCount == 1){
                $password = md5($data['new_pwd']);
                Admin::where('username',Session::get('adminSession'))->update(['password' => $password]);
                return redirect('/admin/setting')->with('message','Password Updated Successfully');

            }
            else{
                return redirect('/admin/setting')->with('message1','Incorrect Current Password');


            }


        }
    }

}
