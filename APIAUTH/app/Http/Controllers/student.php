<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Invite;
use App\Project as Project;
use App\Student as Studentt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class student extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','lang','student']);

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



        return view('student.student.index',compact('adversArr'));
    }

    public function std_info()
    {


        $user_id = Auth::user()->id;


        $user = DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->select('*')
            ->get()->where('user_id', '=', $user_id)->first();

        return view('student.student.info', compact('user'));
    }


    public function std_project()
    {

        $objProo = DB::table('students')
            ->join('projects', 'students.project_id', '=', 'projects.id')
            ->select('*')
            ->get()->where('user_id', '=', Auth::user()->id)->first();


        if (count($objProo) > 0) {

            $proj = Project::where('id', $objProo->id)->get()->first();

            $group = $proj->students;
            $std = Studentt::where('id', Auth::user()->details_std->id)->get()->first();
            $teachers = $std->project->teachers;
        }



        return view('student.student.project', compact('objProo', 'group', 'teachers','proj'));


    }

    public function add_std_project()
    {

        return view('student.student.addproject');
    }

    public function store_project_std(Request $request)
    {
        $objPro = new Project;
        $objPro->name = $request->p_name;
        $objPro->program_type = $request->pr_type;
        $objPro->discreption = $request->discreption;
        $file = $request->project_file;
        $fileNamee = time().$file->getClientOriginalName();
        if(preg_match('/.txt$/', $fileNamee)){
            $file->move(public_path('files'), $fileNamee);

            $objPro->filename = $fileNamee;
        }else{
            return    Redirect::back()->withErrors('must file .txt');
        }
        $objPro->save();


        $std = Studentt::where('id', Auth::user()->details_std->id)->get()->first();
        $objPro->students()->save($std);

        return redirect('/student/project');


    }
    public function add_std_to_project_view(){
        $students = Studentt::where('project_id',0)->get();
        return view('student.student.add_std_to_project_view',compact('students'));
    }
    public function add_std_to_project(Request $request){

        $std = Studentt::where('id',$request->id)->first();

        $project = Project::find(Auth::user()->details_std->project)->first();
        if(count($project->students)==4){
            return Redirect::back()->withErrors(['المجموعة مكتملة']);
        }else{
            $project->students()->save($std);
            return redirect('/student/project');
        }


    }

    public function update_project_std(Request $request)
    {

        $std = Studentt::where('user_id', Auth::user()->id)->get()->first();

        $objProo = $std->project;

        $objProo->name = $request->p_name;
        $objProo->program_type = $request->pr_type;
        $objProo->discreption = $request->discreption;
        $file = $request->project_file;
        $fileNamee = time().$file->getClientOriginalName();
        if(preg_match('/.txt$/', $fileNamee)){
            $file->move(public_path('files'), $fileNamee);

            $objProo->filename = $fileNamee;
        }else{
            return    Redirect::back()->withErrors('must file .txt');
        }
        $objProo->save();
        return redirect('/student/project');



    }

    public function delete_project_std()
    {


        $std = Studentt::where('user_id', Auth::user()->id)->get()->first();

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

        return redirect('/student/project');


    }

    public function update_project_std_view()
    {
        return view('student.student.update');
    }

    public function invite_project_std_view()
    {
        $project = array();
        $stud_id = array();
        $project_invite = array();
        $invite = array();
        $stdArr = array();
        $stdInv = array();
        $std_have_invites_Arr = array();


        $ownerStd = Studentt::where('user_id', Auth::user()->id)->get()->first();
        $invites = $ownerStd->project->invites;
        foreach ($invites as $invite) {
            $stddd = Studentt::where('id', $invite->std_friend_id)->get()->first();

            if (count($stddd->project) == 0)
                $stdInv[] = $stddd;
        }
//-------------------------------------------------------------------------------
        $std = Studentt::all();


        //يتجنب التكرار
        $users = DB::table('students')
            ->join('invites', 'students.id', '=', 'invites.std_friend_id')
            ->select('students.*', DB::raw('count(*) as total'))
            ->groupBy('std_friend_id')
            ->get()->where('total', '<=', '1');

        //بجيبلي كل الطلاب الي معموللهم دعوة
        $std_have_invites = DB::table('students')
            ->join('invites', 'students.id', '=', 'invites.std_friend_id')
            ->select('students.*')
            ->get();
        foreach ($std_have_invites as $invites) {
            $std_have_invites_Arr[] = $invites->id;
        }


        foreach ($std as $st) {

            if (count($st->project) == 0) {
                if (!in_array($st->id, $std_have_invites_Arr)) {
                    $stdArr[] = $st;
                } else {

                }

            }

        }


//        $users = DB::table('students')
//            ->join('invites', 'students.id', '!=', 'invites.std_friend_id')
//            ->select('students.name', DB::raw('count(*) as total'))
//            ->groupBy('std_friend_id')
//            ->get()->where('total', '<=', '1');
//        return $users;

//
//        foreach ($std as $st) {
//
//            if (count($st->project) == 0 ) {
//                   if(count(Invite::where('std_friend_id',$st->id)->get())==0) {
//                       //ليس لديه لا مشروع ولا دعوة
//                       $stdArr[] = $st;
//                   }
//                   else{
//                       $sql = DB::select('SELECT * FROM invites GROUP BY std_friend_id HAVING COUNT(std_friend_id) <=1');
//
//                    foreach ($sql as $sq){
//
//                        $stdArr[]=Studentt::where('id',$sq->std_friend_id)->get()->first();
//                    }
//
////
////                       //                       $invite = Invite::all();
//////                       foreach ($invite as $inv){
//////                           $stud_id[] =  $inv->student_id;
//////                       }
//////                       foreach ($invite as $inv){
//////                           if($inv->std_friend_id==$st->id&&Auth::user()->details_std->id!=$inv->student_id){
//////                               $stdArr[] = $st;
//////                             if(in_array($inv->student_id, $stud_id))
//////                               if(in_array($inv->student_id, $stud_id)) {
//////                                   $stdArr[] = $st;
//////                               }
////                           }
////                       }
//                   }
//
//                }}


//        $std = Studentt::all();
//
//
//        foreach ($std as $st) {
//
//            if (count($st->project) == 0 ) {
//                if(count(Invite::where('std_friend_id',$st->id)->get())==0){
//                    $stdArr[] = $st;
//                }
//            }
//        }
//
//                    $sql = DB::select('SELECT * FROM invites GROUP BY std_friend_id HAVING COUNT(std_friend_id) <=1');
//                    return $sql;
//                    foreach ($sql as $sq){
//
//                        $stdArr[]=Studentt::where('id',$sq->std_friend_id)->get()->first();
//                    }


        return view('student.student.invite', compact('stdArr', 'stdInv'));


    }

    //-------------------------------------------------------------------


    public function invite_store(Request $request)
    {
        $ownerStd = Studentt::where('user_id', Auth::user()->id)->get()->first();
        $project = $ownerStd->project;

        $objInv = new Invite;
        $objInv->std_friend_id = $request->friend;
        $objInv->student_id = $ownerStd->id;
        $objInv->accept = -1;
        $objInv->save();
        $project->invites()->save($objInv);


        return back();


    }

    public function invite_not($id)
    {
        $invite = Invite::where('student_id', Auth::user()->details_std->id)->get()->first();

        $invite->delete();


        return back();
    }
    //
}
