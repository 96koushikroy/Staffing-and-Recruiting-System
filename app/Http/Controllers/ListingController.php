<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\CompanyInfo;
use App\JobCategory;
use App\JobType;
use App\Listing;
use App\PayType;
use App\Shortlist;
use App\Skills;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class ListingController extends Controller
{
    public function getAddListing(){
        if(Auth::check()){
            if(priv() == 1){
                $category=JobCategory::all()->lists('category','category');
                $job_type=JobType::all()->lists('type','type');
                $pay_type=PayType::all()->lists('type','type');
                $skill = Skills::all()->lists('skill');
                return view('superadmin.addlisting',['category'=>$category,'payt'=>$pay_type,'jobt'=>$job_type,'skills'=>$skill]);
            }
            else{
                Session::flash('data','Access Denied! You are trying to access a secured route.');
           return     redirect('dashboard');
            }
        }
        else{
            Session::flash('data','Please Login to Continue.');
         return   redirect('/');
        }
    }

    public function postAddListing(){
        if(Auth::check()){
            if(priv() == 1){
                $n = new Listing;
                $n->lid=uniqid();
                $n->uid=Auth::user()->uid;
                $n->u_name = Auth::user()->name;
                $n->position=Input::get('position');
                $n->category=Input::get('category');
                $n->job_type=Input::get('jobt');
                $n->pay_type=Input::get('payt');
                $n->payment_range='$'.Input::get('pr1').' -'.' $'.Input::get('pr2');
                $n->skills_1=Input::get('skill1');
                $n->skills_2=Input::get('skill2');
                $n->skills_3=Input::get('skill3');
                $n->skills_4=Input::get('skill4');
                $n->skills_5=Input::get('skill5');
                $n->skills_6=Input::get('skill6');
                $n->responsibilities=Input::get('respo');
                $n->requirements=Input::get('req');
                $n->benefits=Input::get('bene');
                $n->status=1;
                $n->job_start_date=date('Y-m-d');
                $n->job_end_date=Input::get('till');
                $n->save();

               Session::flash('data','Listing Was Published Successfully.');
                return redirect()->back();
            }
            else{
                Session::flash('data','Access Denied! You are trying to access a secured route.');
                return     redirect('dashboard');
            }
        }
        else{
            Session::flash('data','Please Login to Continue.');
            return   redirect('/');
        }
    }

    public function getAddJobCategory(){
        if(Auth::check()){
            if(priv() == 1){
                $data = JobCategory::all();
                return view('superadmin.addcategory',['data'=>$data]);
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
    public function postAddJobCategory(){
        if(Auth::check()){
            if(priv() == 1){
                $cn = Input::get('category');
                $n = new JobCategory;
                $n->category= $cn;
                $n->save();
                Session::flash('data','Category Added Successfully.');
            return redirect('add-job-category');
            }
            else{
                Session::flash('data','Access Denied! You are trying to access a secured route.');
           return     redirect('dashboard');
            }
        }
        else{
            Session::flash('data','Please Login to Continue.');
         return   redirect('/');

        }
    }
    public function deleteJobCategory($id){
        if(Auth::check()){
            if(priv() == 1){
                $qry = JobCategory::where('id','=',$id)->delete();
                Session::flash('data','Category Was Deleted Successfully.');
                return redirect('add-job-category');
            }
            else{
                Session::flash('data','Access Denied! You are trying to access a secured route.');
              return  redirect('dashboard');
            }
        }
        else{
            Session::flash('data','Please Login to Continue.');
          return  redirect('/');
        }
    }

    public function getAddJobType(){
        if(Auth::check()){
            if(priv() == 1){
                $data = JobType::all();
                return view('superadmin.addJobType',['data'=>$data]);
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
    public function postAddJobType(){
        if(Auth::check()){
            if(priv() == 1){
                $cn = Input::get('jtype');
                $n = new JobType;
                $n->type= $cn;
                $n->save();
                Session::flash('data','Job Type Added Successfully.');
                return redirect('add-job-type');
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
    public function deleteJobType($id){
        if(Auth::check()){
            if(priv() == 1){
                $qry = JobType::where('id','=',$id)->delete();
                Session::flash('data','Job Type Was Deleted Successfully.');
                return redirect('add-job-type');
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

    public function getAddPayType(){
        if(Auth::check()){
            if(priv() == 1){
                $data = PayType::all();
                return view('superadmin.addPayType',['data'=>$data]);
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
    public function postAddPayType(){
        if(Auth::check()){
            if(priv() == 1){
                $cn = Input::get('ptype');
                $n = new PayType;
                $n->type= $cn;
                $n->save();
                Session::flash('data','Pay Type Added Successfully.');
                return redirect('add-pay-type');
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
    public function deletePayType($id){
        if(Auth::check()){
            if(priv() == 1){
                $qry = PayType::where('id','=',$id)->delete();
                Session::flash('data','Job Type Was Deleted Successfully.');
                return redirect('add-pay-type');
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
    public function getAllListing(){
        if(Auth::check()){
            if(priv() == 1){
               $data = Listing::all();
                return view('superadmin.myListings',['data'=>$data]);
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

    public function showIndividualJobPage($lid){
        $page = Listing::where('lid','=',$lid)->first();
        $pp=Listing::where('lid','=',$lid)->increment('views',1);
        return view('individualJob',['data'=>$page]);
    }

    public function deleteJob($lid){
        if(Auth::check()){
            if(priv() == 1){
Listing::where('lid','=',$lid)->delete();
                Session::flash('data','Listing was deleted Successfully.');
                return redirect()->back();
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
    public function deActivateJob($lid){
        if(Auth::check()){
            if(priv() == 1){
                Listing::where('lid','=',$lid)->update(['status'=>0]);
                Session::flash('data','Listing was De-Activated Successfully.');
                return redirect()->back();
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
public function ActivateJob($lid){
    if(Auth::check()){
        if(priv() == 1){
            Listing::where('lid','=',$lid)->update(['status'=>1]);
            Session::flash('data','Listing was Activated Successfully.');
            return redirect()->back();
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
    public function getJobApplyPage($lid){
        $page = Listing::where('lid','=',$lid)->first();
        $app_id = uniqid();
        return view('JobApply',['appid'=>$app_id,'data'=>$page]);
    }

    public function postJobApplyPage($lid){
        $aid = Input::get('aid');
        $name=Input::get('name');
        $email = Input::get('email');
        $check = Applicant::where('email','=',$email)->where('lid','=',$lid)->count();
        if($check>0){
            Session::flash('data','Sorry. You have already applied for this position. Please check your application using your application ID.');
        return redirect()->back();
        }

        $skill1=Input::get('skill1');
        $skill2=Input::get('skill2');
        $skill3=Input::get('skill3');
        $skill4=Input::get('skill4');
        $skill5=Input::get('skill5');
        $skill6=Input::get('skill6');

        if (Input::hasFile('image1')) {
            $extension1 = Input::file('image1')->getClientOriginalExtension();
            if ($extension1 == 'pdf' || $extension1 == 'PDF' || $extension1 == 'Pdf' || $extension1 == 'pDf' || $extension1 == 'pdF') {
                $date = uniqid() . 'pid';
                $fname = $date . '.' . $extension1;
                $destinationPath = 'resumes/';
                Input::file('image1')->move($destinationPath, $fname);
                $final1 = 'resumes/' . $fname;
            } else {
                Session::flash('data', 'File Upload Problem. Check Input File Format. Only PDF supported for now.');
                return redirect()->back()->withInput();
            }
        } else {
            $final1 = '';
        }

        $cover = Input::get('cover');


        $d = new Applicant;
        $d->lid = $lid;
        $d->aid=$aid;
        $d->name=$name;
        $d->email=$email;
        $d->resume_link=$final1;
        $d->skills_1=$skill1;
        $d->skills_2=$skill2;
        $d->skills_3=$skill3;
        $d->skills_4=$skill4;
        $d->skills_5=$skill5;
        $d->skills_6=$skill6;
        $d->skill_count=Input::get('scount');
        $d->cover_letter=$cover;
        $d->save();

        Session::flash('data','Applied Successfully. Please Check Your Application Status From '.URL::to('application-check').' using this App ID:'.$aid);
        return redirect('job/'.$lid);


    }
    public function checkApplication(){
        $aa = CompanyInfo::where('id','=',1)->first();
      return view('employee.checkApplication',['data'=>$aa]);
    }
    public function postCheckApplication(){

        $da = Input::get('aid');
        $cc = Applicant::where('aid','=',$da)->count();
        if($cc>0){
            $data = Applicant::where('aid','=',$da)->first();
            return view('employee.checkApplicationResult',['d'=>$data]);
        }
        else{
            Session::flash('data','We didnot Find any result for this ID.');
          return  redirect()->back();
        }
    }

    public function getApplicants($lid){
        if(Auth::check()){
            if(priv() == 1){
                $data = Applicant::where('lid','=',$lid)->orderBy('skill_count','Desc')->get();
                return view('superadmin.viewApplicants',['data'=>$data,'lid'=>$lid]);
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

    public function getIndividualApplicants($lid,$uid){
        if(Auth::check()){
            if(priv() == 1){
                $data = Applicant::where('lid','=',$lid)->where('aid','=',$uid)->first();
                Applicant::where('lid','=',$lid)->where('aid','=',$uid)->update(['status'=>'Viewed']);
                return view('superadmin.checkApplicationResult',['d'=>$data,'lid'=>$lid]);
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

    public function shortlistApplicant($lid,$uid){
        if(Auth::check()){
            if(priv() == 1){
                $c = Shortlist::where('lid','=',$lid)->where('uid','=',$uid)->count();
                if($c == 0){
                $data = new Shortlist;
                $data ->uid = $uid;
                $data->lid = $lid;
                $data->save();
                Applicant::where('lid','=',$lid)->where('aid','=',$uid)->update(['status'=>'Short-listed']);
                Session::flash('data','Applicant was Short-listed.');
                }
                else{
                    Session::flash('data','Applicant is already Short-listed.');
                }
                return redirect()->back();
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

    public function sendEmail(){
        $email = Input::get('email');
        $sub = Input::get('subject');
        $body = Input::get('cover');


        Session::flash('data','Email Sent!');
        return   redirect()->back();

    }

    public function getShortlistApplicants($lid){
//return 1;
        if(Auth::check()){
            if(priv() == 1){
               $data = DB::table('shortlist')->join('applicants','applicants.aid','=','shortlist.uid')
                   ->select('applicants.name','applicants.email','applicants.lid','applicants.created_at','applicants.aid','applicants.cover_letter','applicants.skill_count')
                   ->where('applicants.lid','=',$lid)->get();
                return view('superadmin.viewShortlist',['data'=>$data,'lid'=>$lid]);
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
