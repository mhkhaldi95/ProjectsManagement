<?php

namespace App\Http\Controllers;

use App\Advertising as Advertising;
use App\Discussion;
use App\Project as Project;
use App\Student as Student;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminApiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['adminapi', 'auth:api']);
    }

    public function admin_index()
    {
        $projects = Project::all();

        return $projects;
    }

    public function admin_advertising()
    {
        $advs = Advertising::all();
        return $advs;

    }

    public function add_advertising(Request $request)
    {

        $adv = new Advertising;
        $adv->name = $request->name;
        $adv->discreption = $request->discreption;
        // $adv->filename = $request->file;
        $adv->LastDate = $request->LastDate;
        $file = $request->file;
        $fileNamee = time() . $file->getClientOriginalName();
        if (preg_match('/.txt$/', $fileNamee)) {
            $file->move(public_path('files'), $fileNamee);

            $adv->filename = $fileNamee;
        } else {
            return response()->json('must file .txt');
        }


        $today = date("Y-m-d");
        $dattt =$request->LastDate;
        //echo date_format($dattt,"Y-m-d");
       // echo $request->LastDate->format("Y-m-d");
        $middle = strtotime($request->LastDate);             // returns bool(false)

        $new_date = date('Y-m-d', $middle);

        if ($new_date < $today) {

            return response()->json('لا يمكن اضافة هذا التاريخ');
        } else {

            $adv->save();
        }

        return response()->json('add done');


    }
//    public function update_advertising_view($id)
//    {
//        $adv = Advertising::find($id);
//        return view('admin.admin.advertising.updateAdv', compact('adv'));
//    }
    //
    public function update_advertising(Request $request, $id)
    {
        $adv = Advertising::find($id);

        $adv->name = $request->name;
        $adv->discreption = $request->discreption;
        // $adv->filename = $request->filename;
        $adv->LastDate = $request->LastDate;
        $file = $request->file;
        $fileNamee = time() . $file->getClientOriginalName();
        if (preg_match('/.txt$/', $fileNamee)) {
            $file->move(public_path('files'), $fileNamee);

            $adv->filename = $fileNamee;
        } else {
            return response()->json('must file .txt');
        }
        $today = date("Y-m-d");
        if ($request->LastDate < $today) {
            return response()->json('لا يمكن اضافة هذا التاريخ');
        } else {
            $adv->save();
        }

        return response()->json('update done');

    }

    public function delete_advertising($id)
    {
        $adv = Advertising::find($id);
        $adv->delete();
        return response()->json('delete done');
    }

    public function admin_project()
    {
        $projects = Project::all();
        return $projects;
    }

    public function admin_add_project_view()
    {
        $students = Student::where('project_id', 0)->get();
        return $students;
    }

    public function admin_add_project(Request $request)
    {
        $objPro = new Project;
        $objPro->name = $request->name;
        $objPro->program_type = $request->program_type;
        $objPro->discreption = $request->discreption;
        //$objPro->filename = $request->filename;
        $file = $request->file;
        $fileNamee = time() . $file->getClientOriginalName();
        if (preg_match('/.txt$/', $fileNamee)) {
            $file->move(public_path('files'), $fileNamee);

            $objPro->filename = $fileNamee;
        } else {
            return response()->json('must file .txt');
        }
        $objPro->save();

        return response()->json('add done');
    }
//    public function admin_add_std_to_group_view($id){
//        $project = Project::find($id);
//        $students = Student::where('project_id', 0)->get();
//        return view('admin.admin.groups.add_std_to_group',compact('project','students'));
//    }
    public function admin_add_std_to_group(Request $request, $id)
    {

        $project = Project::find($id);
        $students = Student::where('project_id', 0)->get();
        if (count($students) == 0) {
            return response()->json(['لا يوجد طلاب لاضافتهم']);
        } else {
            $std = Student::where('id', $request->id)->get()->first();

            if (count($project->students) < 4) {
                $project->students()->save($std);
                return response()->json(['add done']);
            } else   return response()->json(['المجموعة مكتملة']);
        }

    }

    public function admin_delete_std_from_group($id)
    {
        $std = Student::find($id);
        $std->project_id = 0;
        $std->save();
        return response()->json('delete done');
    }

    public function admin_delete_project($id)
    {
        $project = Project::find($id);
        $stds = $project->students;
        if (count($stds) > 0) {
            foreach ($stds as $std) {
                $std->project_id = 0;
                $std->save();
            }
        }
        $teachers = $project->teachers;
        if (count($teachers) > 0) {
            $project->teachers()->detach($teachers);
        }
        if (count($project->discussion) > 0) {
            $dis = $project->discussion;
            $project->discussion()->delete($dis);

            // $dis->delete();
        }
        $project->delete();
        return response()->json('delete done');

    }
//    public function admin_update_project_view($id)
//    {
//        $project = Project::find($id);
//        return ;
//    }
    public function admin_update_project(Request $request, $id)
    {
        $pro = Project::find($id);

        $pro->name = $request->name;
        $pro->program_type = $request->program_type;
        $pro->discreption = $request->discreption;
        //$pro->filename = $request->filename;
        $file = $request->file;
        $fileNamee = time().$file->getClientOriginalName();
        if(preg_match('/.txt$/', $fileNamee)){
            $file->move(public_path('files'), $fileNamee);

            $pro->filename = $fileNamee;
        }else{
            return    response()->json('must file .txt');
        }
        $pro->save();
        return response()->json('update done');

    }
    public function admin_groups()
    {
        $projects = Project::all();
        foreach ($projects as $project){
            $project->teachers;
            $project->students;
        }
        return $projects;
    }
    public function admin_discussions()
    {
        $discussions = Discussion::all();
        foreach ($discussions as $dis){
            $dis->project;
            $dis->project->teachers;
        }
        return $discussions;

    }
    public function add_discussions_view()
    {
        $projects = Project::where('discussion_id',0)->get();
        return $projects;
    }
    public function add_discussions(Request $request)
    {

        $isfound = false;
        $dis = new Discussion;
        if(count($request->project)>0){
            $dis->project_id=$request->project;
            $dis->date=$request->date;
            $dis->time=$request->time;
            $dis->place=$request->place;
            $dis->duration=$request->duration;
            //$dis->save();

            $today = date("Y-m-d");
            if ($request->date <$today)
            {
                return response()->json('لا يمكن اضافة هذا التاريخ');
            }else{
                $dis->save();
            }
            $disforday = Discussion::where('date',$request->date)->get()->first();
            $di= Discussion::latest()->first();

            if (count($disforday)>0 && $di->project_id!=$disforday->project_id ) {

                if ($disforday->date->format('y-m-d') == $di->date->format('y-m-d')) {

                    if(($disforday->time == $di->time)){

                        if($disforday->place ==$di->place ) {
                            $dis->delete();
                            $isfound = true;
                            return response()->json(['يوجد تعارض ']);
                        }
                    }
                }
            }

        }else
            return response()->json(['لا يوجد مشاريع لتحديد مناقشة لها']);



        if(!$isfound){
            $project = Project::find($request->project);
            $dis->project()->save($project);
        }

        return response()->json('add done');
    }
    public function delete_discussion($id){
        $dis = Discussion::find($id);
        $project = $dis->project;
        $project->discussion_id=0;
        $project->save();
        $dis->delete();
       return response()->json('delete done');
    }
    public function update_discussion(Request $request,$id){
        $dis = Discussion::find($id);
        $dis->date=$request->date;
        $dis->time=$request->time;
        $dis->place=$request->place;
        $dis->duration=$request->duration;
        $today = date("Y-m-d");
        if ($request->date <$today)
        {
            return response()->json('لا يمكن اضافة هذا التاريخ');
        }else{
            $dis->save();
        }
        $alldis = Discussion::all();
        $isfound = false;
        foreach ($alldis as $di){
            if ($dis->project_id!=$di->project_id ) {

                if ($dis->date->format('y-m-d') == $di->date->format('y-m-d')) {

                    if(($request->time == $di->time)){

                        if($dis->place ==$di->place ) {

                            $isfound = true;
                            return response()->json(['يوجد تعارض ']);

                        }
                    }
                }
            }
        }
        if(!$isfound){
            if(count($dis->project)>0) {
                $project = $dis->project;
                $dis->project()->save($project);
            }
        }

        return response()->json('update done');
    }

}
