<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Student as Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Compound;
use function PHPSTORM_META\type;
use App\Project as Project;
use App\Invite;
use App\User as User;
use App\Advertising as Advertising  ;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function std_index()
    {

        return view('student.student.index');
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
            $std = Student::where('id', Auth::user()->details_std->id)->get()->first();
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

        $fileName = time().$file->getClientOriginalName();
        $file->move(public_path('files'), $fileName);

        $objPro->filename = $fileName;
        $objPro->save();


        $std = Student::where('user_id', Auth::user()->id)->get()->first();
        $objPro->students()->save($std);
        $group = $objPro->students;

        // $std->project()->save($objPro);
        $objProo = DB::table('students')
            ->join('projects', 'students.project_id', '=', 'projects.id')
            ->select('*')
            ->get()->where('user_id', '=', Auth::user()->id);
        return redirect('/student/project');


    }
    public function add_std_to_project_view(){
        $students = Student::where('project_id',0)->get();
        $error = null;
        return view('student.student.add_std_to_project_view',compact('students','error'));
    }
    public function add_std_to_project(Request $request){
        $std = Student::where('id',$request->id)->first();

        $project = Project::find(Auth::user()->details_std->project)->first();
        if(count($project->students)==4){
            $error = "عدد طلاب مشروعك مكتمل ";
            $students = Student::where('project_id',0)->get();
            return view('student.student.add_std_to_project_view',compact('students','error'));
        }else{
            $project->students()->save($std);
            return redirect('/student/project');
        }


    }

    public function update_project_std(Request $request)
    {

        $std = Student::where('user_id', Auth::user()->id)->get()->first();

        $objProo = $std->project;

        $objProo->name = $request->p_name;
        $objProo->program_type = $request->pr_type;
        $objProo->discreption = $request->discreption;
        $objProo->filename = $request->project_file;
        $objProo->save();
        return redirect('/student/project');

        /*$objProo->save();
        $group = $objProo->students;
        $std = Student::where('id', Auth::user()->details_std->id)->get()->first();
        $teachers = $std->project->teachers;
        return view('student.student.project', compact('objProo', 'group', 'teachers'));*/


    }

    public function delete_project_std()
    {


        $std = Student::where('user_id', Auth::user()->id)->get()->first();

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

//        $std->project_id = 0;
//        $std->save();

       /* $std = Student::where('user_id', Auth::user()->id)->get()->first();
        $objProo = $std->project;
        return view('student.student.project', compact('objProo'));*/
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


        $ownerStd = Student::where('user_id', Auth::user()->id)->get()->first();
        $invites = $ownerStd->project->invites;
        foreach ($invites as $invite) {
            $stddd = Student::where('id', $invite->std_friend_id)->get()->first();

            if (count($stddd->project) == 0)
                $stdInv[] = $stddd;
        }
//-------------------------------------------------------------------------------
        $std = Student::all();


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
//                        $stdArr[]=Student::where('id',$sq->std_friend_id)->get()->first();
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


//        $std = Student::all();
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
//                        $stdArr[]=Student::where('id',$sq->std_friend_id)->get()->first();
//                    }


        return view('student.student.invite', compact('stdArr', 'stdInv'));


    }

    //-------------------------------------------------------------------


    public function invite_store(Request $request)
    {
        $ownerStd = Student::where('user_id', Auth::user()->id)->get()->first();
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
//------------------------------------------------------------

    public function te_index()
    {

        return view('teacher.testtech.index');
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
        $projects = Project::all();
        $teacher = Teacher::find(Auth::user()->details_tech->id);
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

        $project = Project::find($id);
        $teacher = Teacher::find(Auth::user()->details_tech->id);
        $teacher->projects()->attach($project);

        return back();

    }

    public function delete_project_teahcer($id)
    {
        $project = Project::find($id);
        $teacher = Teacher::where('user_id', Auth::user()->id)->get()->first();

        $project->teachers()->detach($teacher);
        return back();
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
    //------------------------------------------------------------

    public function home_user()
    {
        $projects = Project::all();
        switch (Auth::user()->role) {
            case 1:
                return redirect('/index/student');
                break;
            case 2:
                return redirect('/teacher/index');
                break;
            case 3:
                return redirect('/admin/index');
                break;
        }


    }
    //-------------------------------------------------------------

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
        $adv->filename = $request->file;
        $adv->save();
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
        $adv->filename = $request->filename;
        $adv->save();
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
        $projects = Project::all();
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
        $objPro->filename = $request->project_file;
        $objPro->save();
       // $std = Student::where('id', $request->student)->get()->first();
        //$objPro->students()->save($std);
       // $projects = Project::all();
        return redirect('/admin/projects');
    }
    public function admin_add_std_to_group_view($id){
        $project = Project::find($id);
        $students = Student::where('project_id', 0)->get();
        $error = null;
        return view('admin.admin.groups.add_std_to_group',compact('project','students','error'));
    }
    public function admin_add_std_to_group(Request $request,$id){
        $project = Project::find($id);
//        $students = Student::where('project_id', 0)->get();
        $std = Student::where('id', $request->id)->get()->first();
        $error = null;
        if(count($project->students)<4){
            $project->students()->save($std);
            return Redirect::back();
        }else   return Redirect::back()->withErrors(['المجموعة مكتملة']);

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

    public function admin_update_project(Request $request, $id)
    {
        $pro = Project::find($id);

        $pro->name = $request->p_name;
        $pro->program_type = $request->pr_type;
        $pro->discreption = $request->discreption;
        $pro->filename = $request->filename;
        $pro->save();
        return redirect('/admin/projects');

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
        $disforday = Discussion::where('date',$request->date)->get()->first();
        $isfound = false;
        $dis = new Discussion;
        $dis->project_id=$request->project;
        $dis->date=$request->date;
        $dis->time=$request->time;
        $dis->place=$request->place;
        $dis->duration=$request->duration;
        $dis->save();
        $di= Discussion::latest()->first();

        if (count($disforday)>0) {

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
        $dis->save();

        return redirect('/admin/discussions');
    }


}
