<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Student;
use App\Teacher;
use App\User as User;
use App\Project as Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('index');
});
//test

Auth::routes();

Route::get('/home',function (){
    return view('index');
});Route::get('/index',function (){
    return view('index');
});
Route::get('/reg',function (){
    return view('auth.registertest');
})->middleware('guestt');

Route::get('/home/user','HomeController@home_user');

Route::get('/logintest','guest@login')->middleware('guestt');
Route::get('/std', function ()
{
    $user = User::find(Auth::user()->id)->details_std;

    return view('student.student.index',compact('user'));
});
Route::get('/teach', function ()
{
   $user_id= Auth::user()->id;

    $user = DB::table('users')
        ->join('teachers', 'users.id', '=', 'teachers.user_id')
        ->select('*')
        ->get()->where('user_id', '=', $user_id);

    return view('teacher.testtech.index',compact('user'));
});
Route::get('/download/{name}', function ($name)
{

    $file= public_path(). "/files//".$name;

    $headers = array(
        'Content-Type: application/txt',
    );

    return Response::download($file, $name.".txt", $headers);
});

Route::get('/index/student','student@std_index');
Route::get('/info','student@std_info');
Route::get('/student/project','student@std_project');
Route::get('/project/std/add','student@add_std_project');
Route::post('/std/store_project','student@store_project_std');
Route::post('/add/std_to_project','student@add_std_to_project');
Route::get('/add/std_to_project/view','student@add_std_to_project_view');
Route::get('/std/update/project','student@update_project_std_view');;
Route::post('/std/update_project','student@update_project_std');
Route::get('/std/delete/project','student@delete_project_std');
Route::get('/std/invite/project','student@invite_project_std_view');
Route::get('/std/invite_project','student@invite_project_std');
Route::post('/std/invite/store/project','student@invite_store');
Route::get('/std/invite/not/{id}','student@invite_not');
//----------------------------------------------------------------------------------------
Route::get('/teacher/index','teacher@te_index');
Route::get('/teacher/info','teacher@te_info');
Route::get('/teacher/projects','teacher@te_projects');
Route::get('/add/project/teacher/{id}','teacher@add_project_teacher');
Route::get('/delete/project/teacher/{id}','teacher@delete_project_teahcer');
//----------------------------------------------------------------------------------------
Route::get('/admin/index','admin@admin_index')->middleware('admin');
Route::get('/admin/advertising','admin@admin_advertising')->middleware('admin');
Route::get('/add/advertising/view','admin@add_advertising_view')->middleware('admin');
Route::post('/add/advertising','admin@add_advertising')->middleware('admin');
Route::get('/update/advertising/view/{id}','admin@update_advertising_view')->middleware('admin');
Route::post('/update/advertising/{id}','admin@update_advertising')->middleware('admin');
Route::get('/delete/advertising/{id}','admin@delete_advertising')->middleware('admin');
Route::get('/admin/projects','admin@admin_project')->middleware('admin');
Route::get('/admin/add/projects/view','admin@admin_add_project_view')->middleware('admin');
Route::post('/admin/add/projects','admin@admin_add_project')->middleware('admin');
Route::post('/admin/add/projects/ajax','admin@testajax')->middleware('admin');

Route::post('/admin/delete/project/{id?}','admin@admin_delete_project')->middleware('admin');
Route::get('/admin/update/project/view/{id}','admin@admin_update_project_view')->middleware('admin');
Route::post('/admin/update/project/{d?}','admin@admin_update_project')->middleware('admin');
Route::get('/admin/groups','admin@admin_groups')->middleware('admin');
Route::get('/admin/delete/std_form_group/{id}','admin@admin_delete_std_from_group')->middleware('admin');
Route::get('/admin/download/{id}',function ($id){

    $project = Project::find($id);

    $name = $project->filename;

   // $headers = array('Content_Type : application/image');
    return Storage::download(public_path(),$name);
})->middleware('admin');

Route::get('/add/std_to_group/view/{id}','admin@admin_add_std_to_group_view')->middleware('admin');
Route::post('/add/std_to_group/{id}','admin@admin_add_std_to_group')->middleware('admin');
Route::get('/admin/discussions','admin@admin_discussions')->middleware('admin');
Route::get('/admin/add/discussions/view','admin@add_discussions_view')->middleware('admin');
Route::post('/admin/add/discussions','admin@add_discussions')->middleware('admin');
Route::get('/delete/discussion/{id}','admin@delete_discussion')->middleware('admin');
Route::get('/update/discussions/view/{id}','admin@update_discussion_view')->middleware('admin');
Route::post('/update/discussions/{id}','admin@update_discussion')->middleware('admin');
Route::get('/admin/change/lang/{lang}',['as'=>'lang','uses'=>'languagecont@change']);
//    ->middleware(['lang']);

Route::get('/testajax',function (){
    return view('testajax');
});
Route::get('/page',function (){
    return view('modal');
});
Route::get('/datatable',function (){
    return view('datatable');
});
Route::get('/sweet',function (){
    return view('sweet');
});
Route::post('/sweetform/{data?}',function ($data){
    return $data;
});
Route::resource('/test','testController');











