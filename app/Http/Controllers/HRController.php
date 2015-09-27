<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class HRController extends Controller
{
    public function getAddDept(){
        if(Auth::check()){
            if(priv() == 1){
                $data = Department::all();
                return view('superadmin.addDept',['data'=>$data]);
            }
            else{
                Session::flash('data','Access Denied! You are trying to access a secured route.');
                return     redirect('dashboard');
            }
        }
        else{
            Session::flash('data','Please Login to Continue.');
            return  redirect('/');
        }
    }
    public function postAddDept(){
        if(Auth::check()){
            if(priv() == 1){
                $cn = Input::get('jtype');
                $n = new Department;
                $n->d_name=$cn;
                $n->save();
                Session::flash('data','Department Added Successfully.');
                return redirect('add-department');
            }
            else{
                Session::flash('data','Access Denied! You are trying to access a secured route.');
                return  redirect('dashboard');
            }
        }
        else{
            Session::flash('data','Please Login to Continue.');
            redirect('/');

        }
    }
    public function deleteDept($id){
        if(Auth::check()){
            if(priv() == 1){
                $qry = Department::where('id','=',$id)->delete();
                Session::flash('data','Departments Was Deleted Successfully.');
                return redirect('add-department');
            }
            else{
                Session::flash('data','Access Denied! You are trying to access a secured route.');
                return   redirect('dashboard');
            }
        }
        else{
            Session::flash('data','Please Login to Continue.');
            return   redirect('/');
        }
    }
}
function priv(){
    return  Auth::user()->privilege;
}