<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function getFirstPage(){
        $c_count = CompanyInfo::where('id','>',0)->count();

        if($c_count>0){
            $user_count= User::where('id','>',0)->count();
            if($user_count > 0){
                if(Auth::check()){return redirect('dashboard');}else{
                    $aa = CompanyInfo::where('id','=',1)->first();
                    return view('welcome',['data'=>$aa]);
                }
            }
            else{

                return view('install-2',['company_name'=>CompanyInfo::where('id','=',1)->pluck('name')]);
            }

        }
        else{
            return view('install-1');
        }
    }

    public function postSaveBasic(){
        $name= Input::get('name');
        $about=Input::get('about');
        if (Input::hasFile('image1')) {
            //return 2;
            $extension1 = Input::file('image1')->getClientOriginalExtension();
            if ($extension1 == 'png' || $extension1 == 'jpg' || $extension1 == 'jpeg' || $extension1 == 'bmp' || $extension1 == 'PNG' || $extension1 == 'JPG' || $extension1 == 'JPEG' || $extension1 == 'BMP') {
                $date = uniqid() . 'pid';
                $fname = $date . '.' . $extension1;
                $destinationPath = 'company_images/';
                Input::file('image1')->move($destinationPath, $fname);
                $final1 = 'company_images/' . $fname;
            } else {
                Session::flash('data', 'Image Upload Problem. Check Image File Format.');
                return Redirect::to('/')->withInput();
            }
        } else {
            $final1 = '';
        }

        $new_data = new CompanyInfo;
        $new_data->name=$name;
        $new_data->about=$about;
        $new_data->logo=$final1;
        $new_data->save();

Session::flash('data','Data Saved Successfully.');
return redirect('/');
    }
    public function postCreateFirstAdmin(){
        $name = Input::get('name');
        $email= Input::get('email');
        $pass  = Input::get('pass');
        $n = new User;
        $n->name=$name;
        $n->uid=uniqid();
        $n->email=$email;
        $n->password=Hash::make($pass);
        $n->privilege=1;
        $n->save();
        Session::flash('data','Data Saved Successfully.');
        return redirect('/');
    }
    public function postLogin(){
$email = Input::get('email');
        $pass = Input::get('pass');
        if(Auth::attempt(['email'=>$email,'password'=>$pass])){
            return redirect('dashboard');
        }
        else{
            Session::flash('data','Your Login Credentials did not Match. Please Recheck.');
            return redirect('/');
        }
    }
    public function UserLogout(){
        Auth::logout();
        Session::flash('data','Logged Out Successfully.');
        return redirect('/');
    }
    public function getDashboard(){
        if(priv() == 1){
            return view('dashboard.superadmin');
        }


    }
}
function priv(){
    return  Auth::user()->privilege;
}