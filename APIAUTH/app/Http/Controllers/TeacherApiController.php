<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Project as Project;
use App\Teacher as Teacherr;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TeacherApiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['teacherapi', 'auth:api']);
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
        return $adversArr;
    }
    public function te_info(Request $request)
    {
        $userdata = User::find($request->user()->id);

        $userdata->details_tech;

        return $userdata;
    }
    public function myproject(Request $request){
        $teacher = Teacherr::find($request->user()->details_tech->id);
        return $teacher->projects;
    }
    public function projectsneeded(Request $request){
        $arr= array();
      $arrid= array();
        $projcetsTech = Teacherr::find($request->user()->details_tech->id);
        $projectsTech=  $projcetsTech->projects;

        foreach ($projectsTech as $pro){
            $arrid[]=$pro->id;
        }
        $all = Project::all();
        foreach ($all as $pro){
            if(!in_array($pro->id,$arrid))
            $arr[]=$pro;
        }

        return response()->json($arr);

    }
    public function te_projects()
    {
        $projects = Project::all();

        return $projects;
    }
    public function add_project_teacher(Request $request,$id)
    {

        $teacher = Teacherr::find($request->user()->details_tech->id);
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
                return response()->json('add done');

            }else {
                return   response()->json( 'هذا المشروع مضاف لديك');
            }
        }else {
            return  response()->json( 'المشروع الذي تحاول أن تضيفه لك غير موجود');
        }

    }
    public function delete_project_teahcer(Request $request ,$id)
    {
        $allproject = Project::all();
        $found = false;
        foreach ($allproject as $pro) {
            if ($id == $pro->id) {
                $found = true;

            }
            }
        if ($found) {
            $project = Project::find($id);
            $teacher = Teacherr::where('user_id', $request->user()->id)->get()->first();

            $project->teachers()->detach($teacher);
          return  response()->json( 'delete done');
        } else {
            return response()->json('المشروع الذي تحاول أن تلغي مناقشتك له غير موجود');
        }
    }
    //
}
