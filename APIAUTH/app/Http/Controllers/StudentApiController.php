<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Project as Project;
use App\Student as Studentt;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StudentApiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['studentapi', 'auth:api']);
    }
    public function std_index()
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



        return $adversArr;
    }
    public function std_info(Request $request)
    {
        $userdata = User::find($request->user()->id);
        $userdata->details_std;
        return $userdata;
    }
    public function std_project(Request $request)
    {
        $std = Studentt::where('user_id',$request->user()->id)->get()->first();
        $std->project;
        if(count($std->project)>0){
            $std->project->students;
             $std->project->teachers;
            $std->project->discussion;

        }
        return $std;
    }
    public function delete_project_std(Request $request)
    {

        $std = Studentt::where('user_id',$request->user()->id)->get()->first();

        $project = $std->project;
        $teachers = $std->project->teachers;
        if (count($teachers) > 0) {
            $project->teachers()->detach($teachers);
        }
        $project->delete();
        foreach ($project->students as $std){
            $std->project_id = 0;
            $std->save();
        }

        return "delete done";


    }
    public function store_project_std(Request $request){


        $objPro = new Project;
        $objPro->name = $request->name;
        $objPro->program_type = $request->program_type;
        $objPro->discreption = $request->discreption;
        //$objPro->filename = $request->filename;
        $file = $request->file;
        $fileNamee = time().$file->getClientOriginalName();
        if(preg_match('/.txt$/', $fileNamee)){
            $file->move(public_path('files'), $fileNamee);

            $objPro->filename = $fileNamee;
        }else{
            return    response()->json(['must file .txt']);
        }
        $objPro->save();
        $std = Studentt::find($request->user()->details_std->id);
        $objPro->students()->save($std);

        return "add done";
    }
    public function update_project_std(Request $request)
    {

        $std = Studentt::find($request->user()->details_std->id);

        $objPro=$std->project;
        $objPro->name = $request->name;
        $objPro->program_type = $request->program_type;
        $objPro->discreption = $request->discreption;
        $file = $request->file;
        $fileNamee = time().$file->getClientOriginalName();
        if(preg_match('/.txt$/', $fileNamee)){
            $file->move(public_path('files'), $fileNamee);

            $objPro->filename = $fileNamee;
        }else{
            return    response()->json(['must file .txt']);
        }
        $objPro->save();
        return response()->json(['update done']);
    }
    public function add_std_to_project(Request $request){

        $std = Studentt::find($request->id);
        if($std->project_id==0){
            $project = Project::find($request->user()->details_std->project->id);

            if(count($project->students)==4){
                //return Redirect::back()->withErrors(['المجموعة مكتملة']);//for normal
                return response()->json(['المجموعة مكتملة']);
            }else{
                $project->students()->save($std);
                return response()->json(['add done']);
            }
        }else {
            return response()->json(['الطالب الذي تحاول أن تضيفه لديه مشروع']);
        }




    }
    public function add_std_to_project_view(){
        $students = Studentt::where('project_id',0)->get();
        return $students;
    }

}
