<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Application;
use App\Models\School;

class ApplicationController extends Controller
{
    //
    public function index()
    {
        if(!session()->has('scholar')){return redirect('/');}
        $data = Application::where(['email' => session('email')])->get();
        if(session('accType') == 'Admin')
        return view('dashboard',['data' => $data]);
        if(session('accType') == 'Applicant')
        return view('application',['data' => $data]);
    }
    public function applicants()
    {
        if(!session()->has('scholar')){return redirect('/');}
        if(session('accType') != 'Admin'){return redirect('/logout');}
        $data = DB::table('applications')->whereIn('status',['Inprogress','Approved','Rejected'])->orderByRaw("FIELD(type, 'Phd', 'Msc', 'Undergraduate') ASC")->orderBy('applications.id','DESC')->get();
        return view('applicant',['data' => $data]);
    }
    public function schools()
    {
        if(!session()->has('scholar')){return redirect('/');}
        if(session('accType') != 'Admin'){return redirect('/logout');}
        $data = DB::table('schools')->orderBy('schools.country','ASC')->get();
        return view('school',['data' => $data]);
    }
    public function applicantData(Request $req)
    {
        $data = Application::where(['id' => $req -> id])->get();
        //$data = $req -> id;
        return view('view applicant record',['data' => $data]);
    }
    public function applicantStatus(Request $req)
    {
        $staff = Application::where(['id' => $req -> id])->update([
        'status' => $req -> status
        ]);
        return 'Good';
    }
    public function schoolList(Request $req)
    {
        $data = Application::where(['school' => $req -> school])->get();
        //$data = $req -> id;
        return view('view school list',['data' => $data]);
    }
    
    public function store(Request $req)
    {
        if(!session()->has('scholar')){return redirect('/');}
        if (Application::where(['email' => $req -> email])->exists()) {
            return 'fail';
        }else{

        $staff = new Application;
        $staff -> name = strtoupper($req -> name);
        $staff -> phone = $req -> phone;
        $staff -> email = strtolower($req -> email);
        $staff -> lga = strtoupper($req -> lga);
        $staff -> nin = $req -> nin;
        $staff -> admissionStatus = $req -> status;
        $staff -> country = strtoupper($req -> country);
        $staff -> school = strtoupper($req -> school);
        $staff -> type = $req -> type;
        $staff -> course = strtoupper($req -> course);
        $staff -> primary = strtoupper($req -> primary);
        $staff -> secondary = strtoupper($req -> secondary);
        $staff -> under = strtoupper($req -> under);
        $staff -> msc = strtoupper($req -> msc);
        $staff -> fileprimary = $req -> fileprimary;
        $staff -> filesecondary = $req -> filesecondary;
        $staff -> fileunder = $req -> fileunder;
        $staff -> filemsc = $req -> filemsc;
        $staff -> fileindigine = $req -> fileindigine;
        $staff -> filenin = $req -> filenin;
        $staff -> filetranscript = $req -> filetranscript;
        $staff -> fileadmission = $req -> fileadmission;
        $staff -> filefee = $req -> filefee;
        $staff -> filepastport = $req -> filepastport;
        $staff -> session = date('Y');
        $staff -> save();

        if($req->file('filep')){
            $req->file('filep')->storeAs('upload',  $req -> fileprimary,'public');
        }
        if($req->file('files')){
            $req->file('files')->storeAs('upload',  $req -> filesecondary,'public');
        }
        if($req->file('fileu')){
            $req->file('fileu')->storeAs('upload',  $req -> fileunder,'public');
        }
        if($req->file('filem')){
            $req->file('filem')->storeAs('upload',  $req -> filemsc,'public');
        }
        if($req->file('filei')){
            $req->file('filei')->storeAs('upload',  $req -> fileindigine,'public');
        }
        if($req->file('filen')){
            $req->file('filen')->storeAs('upload',  $req -> filenin,'public');
        }
        if($req->file('filetrans')){
            $req->file('filetrans')->storeAs('upload',  $req -> filetranscript,'public');
        }
        if($req->file('filead')){
            $req->file('filead')->storeAs('upload',  $req -> fileadmission,'public');
        }
        if($req->file('filefe')){
            $req->file('filefe')->storeAs('upload',  $req -> filefee,'public');
        }
        if($req->file('filepast')){
            $req->file('filepast')->storeAs('upload',  $req -> filepastport,'public');
        }

        $req -> session() -> flash('message', 'Done');
        return 'Done';
        }
    }

    public function update(Request $req)
    {
        if(!session()->has('scholar')){return redirect('/');}
        $staff = Application::where(['id' => $req -> id])->update([
        'name' => strtoupper($req -> name),
        'nin' => $req -> nin,
        'phone' => $req -> phone,
        'primary' => strtoupper($req -> primary),
        'secondary' => strtoupper($req -> secondary),
        'under' => strtoupper($req -> under),
        'msc' => strtoupper($req -> msc),
        'course' => strtoupper($req -> course),
        'admissionStatus' => $req -> status,
        'country' => strtoupper($req -> country),
        'school' => strtoupper($req -> school),
        'lga' => strtoupper($req -> lga)
        ]);

        if($req->file('filep')){
            $staff = Application::where(['id' => $req -> id])->update([
            'fileprimary' => $req -> fileprimary
            ]);
            $req->file('filep')->storeAs('upload',  $req -> fileprimary,'public');
        }
        if($req->file('files')){
            $staff = Application::where(['id' => $req -> id])->update([
            'filesecondary' => $req -> filesecondary
            ]);
            $req->file('files')->storeAs('upload',  $req -> filesecondary,'public');
        }
        if($req->file('fileu')){
            $staff = Application::where(['id' => $req -> id])->update([
            'fileunder' => $req -> fileunder
            ]);
            $req->file('fileu')->storeAs('upload',  $req -> fileunder,'public');
        }
        if($req->file('filem')){
            $staff = Application::where(['id' => $req -> id])->update([
            'filemsc' => $req -> filemsc
            ]);
            $req->file('filem')->storeAs('upload',  $req -> filemsc,'public');
        }
        if($req->file('filei')){
            $staff = Application::where(['id' => $req -> id])->update([
            'fileindigine' => $req -> fileindigine
            ]);
            $req->file('filei')->storeAs('upload',  $req -> fileindigine,'public');
        }
        if($req->file('filen')){
            $staff = Application::where(['id' => $req -> id])->update([
            'filenin' => $req -> filenin
            ]);
            $req->file('filen')->storeAs('upload',  $req -> filenin,'public');
        }
        if($req->file('filetrans')){
            $staff = Application::where(['id' => $req -> id])->update([
            'filetranscript' => $req -> filetranscript
            ]);
            $req->file('filetrans')->storeAs('upload',  $req -> filetranscript,'public');
        }
        if($req->file('filead')){
            $staff = Application::where(['id' => $req -> id])->update([
            'fileadmission' => $req -> fileadmission
            ]);
            $req->file('filead')->storeAs('upload',  $req -> fileadmission,'public');
        }
        if($req->file('filefe')){
            $staff = Application::where(['id' => $req -> id])->update([
            'filefee' => $req -> filefee
            ]);
            $req->file('filefe')->storeAs('upload',  $req -> filefee,'public');
        }
        if($req->file('filepast')){
            $staff = Application::where(['id' => $req -> id])->update([
            'filepastport' => $req -> filepastport
            ]);
            $req->file('filepast')->storeAs('upload',  $req -> filepastport,'public');
        }
        $req -> session() -> flash('message', 'Updated');
        return 'Updated';
    }

    public function getSchool(Request $req)
    {
        if(!session()->has('scholar')){return redirect('/');}
        $school = School::where(['country' => $req -> country])->get();
        $add='';
        //$add='<option value="">Select School from '.$req -> country.'</option>';
        foreach ($school as $row) {
            $add .= '<option value="'.$row->school.'">'.$row->school.'</option>';
        }
        return $add;
    }

    public function destroy(Request $req)
    {
        if(!session()->has('scholar')){return redirect('/');}
        $staff = Application::find($req->id)->delete();
        
        $req -> session() -> flash('message', 'Removed');
        return redirect('application');
    }
}
