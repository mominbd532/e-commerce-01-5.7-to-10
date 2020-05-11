<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function loginRegister(){
        return view('users.login_register');
    }



    public function check_email(Request $request)
    {
        $data =$request->all();
        $userCount =User::where(['email'=>$data['email']])->count();
        if($userCount>0){
            echo "false";
        }else{
            echo "true"; die;
        }
    }

    public function register(Request $request){


        if($request->isMethod('post')){
            $data =$request->all();
            if(!empty($data['email'])){
                $userCount =User::where(['email'=>$data['email']])->count();
                if($userCount>0){
                    return redirect()->back()->with('message1','Email already exists');
                }else{
                    $user = new User();
                    $user->name =$data['name'];
                    $user->email  =$data['email'];
                    $user->password  = bcrypt($data['password']);
                    $user->save();

                    //Send Register Email
//                    $email = $data['email'];
//                    $messageData =['email'=>$data['email'],'name'=>$data['name']];
//                    Mail::send('emails.register',$messageData,function ($message)use($email){
//                        $message->to($email)->subject('welcome to E-Shopper');
//                    });

                    //Send Confirmation mail

                    $email = $data['email'];
                    $messageData =['email'=>$data['email'],'name'=>$data['name'],'code'=>base64_encode($data['email'])];
                    Mail::send('emails.confirmation',$messageData,function ($message)use($email){
                        $message->to($email)->subject('Confirm your MM BAZAAR account');
                    });

                    return redirect()->back()->with('message','Please confirm your email address for active account');

//                    if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
//                        Session::put('front_login',$data['email']);
//                        return redirect()->to('/cart');
//
//                    }
                }
            }else{
                return redirect()->back()->with('message1','Please enter valid email');
            }

        }
    }

    public function logout(){
        Auth::logout();
        Session::forget('front_login');
        Session::forget('session_id');
        return redirect()->to('/');
    }

    public function login(Request $request){
        $data = $request->all();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            $userStatus =User::where('email',$data['email'])->first();
            if($userStatus->status ==0){
                return redirect()->back()->with('message1','Your account is not active, please contact to admin');
            }
            Session::put('front_login',$data['email']);
            return redirect('/');
        }else{
            return redirect()->back()->with('message1','You entered invalid email or password');
        }
    }

    public function account(Request $request){
        $user_id =Auth::user()->id;
        $user_details =User::find($user_id);
        $countries =Country::get();
        if($request->isMethod('post')){
            $data =$request->all();
            if(empty($data['name'])){
                return redirect()->back()->with('message1','Please enter your name');
            }
            if(empty($data['address'])){
                $data['address']= "";
            }
            if(empty($data['city'])){
                $data['city']= "";
            }
            if(empty($data['state'])){
                $data['state']= "";
            }

            $user =User::find($user_id);
            $user->name = $data['name'];
            $user->address =$data['address'];
            $user->city =$data['city'];
            $user->state =$data['state'];
            $user->country =$data['country'];
            $user->pincode =$data['pincode'];
            $user->mobile =$data['mobile'];
            $user->save();

            return redirect()->back()->with('message','Your account details updated successfully');


        }



        return view('users.account',compact('countries','user_details'));
    }

    public function checkPassword(Request $request){
        $data =$request->all();
        $current_password =$data['current_pwd'];
        $user_id =Auth::user()->id;
        $userInfo =User::where('id',$user_id)->first();
        if(Hash::check($current_password,$userInfo->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){

        if($request->isMethod('post')){
            $data =$request->all();
            $userInfo =User::where('id',Auth::user()->id)->first();
            $current_password =$data['current_pwd'];
            if(Hash::check($current_password,$userInfo->password)){
                $new_pwd =bcrypt($data['new_pwd']);
                User::where('id',Auth::user()->id)->update(['password'=>$new_pwd]);
                return redirect()->back()->with('message','Password updated successfully');
            }else{
                return redirect()->back()->with('message1','Current password is incorrect');
            }


        }

    }

    public function confirmEmail($code){
        $email =base64_decode($code);
        $emailCheck =User::where('email',$email)->count();
        if($emailCheck > 0){
            $userDetails =User::where('email',$email)->first();
            if($userDetails->status == 1){
                return redirect()->to('/login-register')->with('message1','Your account already activated , please login');
            }else{
                User::where('email',$email)->update(['status'=>1]);

//                Send Register Email

                    $messageData =['email'=>$email,'name'=>$userDetails->name];
                    Mail::send('emails.welcome',$messageData,function ($message)use($email){
                        $message->to($email)->subject('Welcome to E-Shopper');
                    });

                    return redirect()->to('/login-register')->with('message1','Please login');


            }
        }
        else{
            abort(404);
        }


    }






}
