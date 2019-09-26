<?php

namespace App\Http\Controllers;

use App\Advertising as Advertising;
use App\Discussion;
use App\Project as Project;
use App\Student as Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Invite;

use App\Student as Studentt;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','lang']);
    }

    public function admin_index()
    {
        $projects = Project::all();
        return view('admin.admin.index', compact('projects'));
    }

    public function admin_advertising()
    {
        $advs = Advertising::all();
        return view('admin.admin.advertising', compact('advs'));

    }

    public function add_advertising_view()
    {
        return view('admin.admin.advertising.AddAdvertising');
    }

    public function add_advertising(Request $request)
    {

        $adv = new Advertising;
        $adv->name = $request->name;
        $adv->discreption = $request->discreption;
       // $adv->filename = $request->file;
        $adv->LastDate = $request->LastDate;
        $file = $request->file;
        $fileNamee = time().$file->getClientOriginalName();
        if(preg_match('/.txt$/', $fileNamee)){
            $file->move(public_path('files'), $fileNamee);

            $adv->filename = $fileNamee;
        }else{
        return    Redirect::back()->withErrors('must file .txt');
        }



        $today = date("Y-m-d");
            if ($request->LastDate <$today)
            {
            return Redirect::back()->withErrors('لا يمكن اضافة هذا التاريخ');
            }else{
                $adv->save();
        }

        return redirect('/admin/advertising');


    }

    public function update_advertising_view($id)
    {
        $adv = Advertising::find($id);
        return view('admin.admin.advertising.updateAdv', compact('adv'));
    }

    public function update_advertising(Request $request, $id)
    {
        $adv = Advertising::find($id);
        $adv->name = $request->name;
        $adv->discreption = $request->discreption;
       // $adv->filename = $request->filename;
        $adv->LastDate = $request->LastDate;
        $file = $request->file;
        $fileNamee = time().$file->getClientOriginalName();
        if(preg_match('/.txt$/', $fileNamee)){
        $file->move(public_path('files'), $fileNamee);

        $adv->filename = $fileNamee;
    }else{
        return    Redirect::back()->withErrors('must file .txt');
    }
        $today = date("Y-m-d");
        if ($request->LastDate <$today)
        {
            return Redirect::back()->withErrors('لا يمكن اضافة هذا التاريخ');
        }else{
            $adv->save();
        }

        return redirect('/admin/advertising');

    }

    public function delete_advertising($id)
    {
        $adv = Advertising::find($id)->first();
        $adv->delete();
        return back();
    }

    public function admin_project()
    {
        $projects = Project::paginate(10);
        return view('admin.admin.projects.projects', compact('projects'));
    }

    public function admin_add_project_view()
    {
        $students = Student::where('project_id', 0)->get();
        return view('admin.admin.projects.addprojects', compact('students'));
    }

    public function admin_add_project(Request $request)
    {
        $objPro = new Project;
        $objPro->name = $request->p_name;
        $objPro->program_type = $request->pr_type;
        $objPro->discreption = $request->discreption;
        //$objPro->filename = $request->project_file;
        $file = $request->project_file;
        $fileNamee = time().$file->getClientOriginalName();
        if(preg_match('/.txt$/', $fileNamee)){
            $file->move(public_path('files'), $fileNamee);

            $objPro->filename = $fileNamee;
        }else{
            if($request->ajax()){
                return response()->json(['message'=>'must file .txt']);

            }else return Redirect::back()->withErrors('must file .txt');

        }
        $objPro->save();
        if($request->ajax()){
            return response()->json(['message'=>'done','data'=>$objPro],200);

        }else return back();

    }
    public function admin_add_std_to_group_view($id){
        $project = Project::find($id);
        $students = Student::where('project_id', 0)->get();
        return view('admin.admin.groups.add_std_to_group',compact('project','students'));
    }
    public function admin_add_std_to_group(Request $request,$id){

        $project = Project::find($id);
      $students = Student::where('project_id', 0)->get();
        if(count($students)==0){
            return Redirect::back()->withErrors(['لا يوجد طلاب لاضافتهم']);
        }else {
            $std = Student::where('id', $request->id)->get()->first();

            if (count($project->students) < 4) {
                $project->students()->save($std);
                return Redirect::back();
            } else   return Redirect::back()->withErrors(['المجموعة مكتملة']);
        }

    }
    public function admin_delete_std_from_group($id){
        $std = Student::find($id);
        $std->project_id=0;
        $std->save();
        return back();
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
        return back();

    }

    public function admin_update_project_view($id)
    {

        $project = Project::find($id);
        return view('admin.admin.projects.update', compact('project'));
    }

    public function admin_update_project(Request $request, $d)
    {

        $pro = Project::find($d);

        $pro->name = $request->p_name;
        $pro->program_type = $request->pr_type;
        $pro->discreption = $request->discreption;
        //$pro->filename = $request->filename;
        $file = $request->project_file;
        $fileNamee = time().$file->getClientOriginalName();
        if(preg_match('/.txt$/', $fileNamee)){
            $file->move(public_path('files'), $fileNamee);

            $pro->filename = $fileNamee;
        }else{
            return response()->json(['error'=>'must file .txt']);
        }
        $pro->save();
//        return redirect('/admin/projects');
        return response()->json(['success'=>'update done.','data'=>$pro],200);



    }

    public function admin_groups()
    {
        $projects = Project::all();
        return view('admin.admin.groups.groups', compact('projects'));
    }

    public function admin_discussions()
    {
        $discussions = Discussion::all();
        return view('admin.admin.discussions.discussions', compact('discussions'));
    }

    public function add_discussions_view()
    {
        $projects = Project::all();
        // $error = null;
        return view('admin.admin.discussions.adddis', compact('projects'));
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
                return Redirect::back()->withErrors('لا يمكن اضافة هذا التاريخ');
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
                        return Redirect::back()->withErrors(['يوجد تعارض ']);
                    }
                }
            }
        }

        }else
            return Redirect::back()->withErrors(['لا يوجد مشاريع لتحديد مناقشة لها']);



        if(!$isfound){
            $project = Project::find($request->project);
            $dis->project()->save($project);
        }

        return redirect('/admin/discussions');
    }
    public function delete_discussion($id){
        $dis = Discussion::find($id);
        $project = $dis->project;
        $project->discussion_id=0;
        $project->save();
        $dis->delete();
        return back();
    }
    public function update_discussion_view($id){
        $dis = Discussion::find($id);
        return view('admin.admin.discussions.update',compact('dis'));
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
            return Redirect::back()->withErrors('لا يمكن اضافة هذا التاريخ');
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
                            return Redirect::back()->withErrors(['يوجد تعارض ']);

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

        return redirect('/admin/discussions');
    }

    //
}
