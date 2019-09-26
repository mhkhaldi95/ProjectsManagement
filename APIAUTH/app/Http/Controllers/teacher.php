<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Project as Project;
use App\Student as Student;
use App\Teacher as Teacherr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class teacher extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','teacher','lang']);
    }

    public function te_index()
    {

        $adversArr = array();
        $advers = Advertising::all();

        $today = date("Y-m-d");
        foreach ($advers as $adver){

            if ($adver->LastDate >$today)
            {
                $adversArr[]= $adver;
            }
        }
        return view('teacher.testtech.index', compact('adversArr'));
    }

    public function te_info()
    {
        $user_id = Auth::user()->id;


        $user = DB::table('users')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
            ->select('*')
            ->get()->where('user_id', '=', $user_id)->first();


        return view('teacher.testtech.info', compact('user'));
    }

    public function te_projects()
    {
//        $allproject = Project::all();
//        foreach ($allproject as $pro){
//            if($id ==$pro->id ){
//                $project = Project::find($id);
//                $teacher = Teacherr::where('user_id', Auth::user()->id)->get()->first();
//
//                $project->teachers()->detach($teacher);
//                return back();
//            }else{
//                return Redirect::back()->withErrors('المشروع الذي تحاول أن تلغي مناقشتك له غير موجود');;
//            }
//        }
        //----------------
        $projects = Project::all();
        $teacher = Teacherr::find(Auth::user()->details_tech->id);
        $projectss = $teacher->projects;
        $id_project = array();

        if (count($projects) > 0) {
            foreach ($projectss as $project) {
                $id_project[] = $project->id;
            }
        }


        return view('teacher.testtech.projects', compact('projects', 'id_project'));
    }

    public function add_project_teacher($id)
    {


        $teacher = Teacherr::find(Auth::user()->details_tech->id);
        $proj_teacher = $teacher->projects;
        $id_project = array();

        if (count($proj_teacher) > 0) {
            foreach ($proj_teacher as $project) {
                $id_project[] = $project->id;
            }
        }
        $pro =Project::find($id);
        if(count($pro)>0){
            if(!in_array($id,$id_project)){
                $project = Project::find($id);
                $teacher->projects()->attach($project);
                return back();

            }else {
                return   Redirect::back()->withErrors('هذا المشروع مضاف لديك');
            }
        }else {
         return   Redirect::back()->withErrors('المشروع الذي تحاول أن تضيفه لك غير موجود');
        }



    }

    public function delete_project_teahcer($id)
    {
        $allproject = Project::all();
        foreach ($allproject as $pro){
            if($id ==$pro->id ){
                $project = Project::find($id);
                $teacher = Teacherr::where('user_id', Auth::user()->id)->get()->first();

                $project->teachers()->detach($teacher);
                return back();
            }else{
                return Redirect::back()->withErrors('المشروع الذي تحاول أن تلغي مناقشتك له غير موجود');;
            }
        }

    }

    public function project_teahcers()
    {
        $std = Student::where('id', Auth::user()->details_std->id)->get()->first();
        $teachers = $std->project->teachers;

    }

    public function view_projects_for_teacher()
    {
        $projects = Project::all();
        return view('teacher.testtech.projects', compact('projects'));
    }
    //
}
