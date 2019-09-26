<?php

use App\Project as Project;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/reg',function (Request $request){

    $objstd = new Student;
    $objtech = new Teacher;
    if($request['type']=="Student"){

        $objstd->name = $request['name'];
        $objstd->phone = $request['phone'];
        $objstd->IDD = $request['IDD'];
        $objstd->specialization = $request['specialization'];
        $objstd->level = $request['level'];


        $user =   User::create([

            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' =>1,
        ]);
        $user ->details_std()->save($objstd);
        //return $user;

    }else {


        $objtech->name = $request['name'];
        $objtech->phone = $request['phone'];
        $objtech->IDD = $request['IDD'];
        $objtech->specialization = $request['specialization'];


        $user =   User::create([

            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' =>2,
        ]);
        $user ->details_tech()->save($objtech);
        //return $user;
    }
    return "التسجيل تم";

})->middleware('guesttapi');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/allstd',function (){
    $std = Student::all();
    return response()->json(['data'=>$std]);
});
//--------------------------------------Student--------------------------------------------------------
Route::get('/std/index','StudentApiController@std_index');
Route::get('/std/info','StudentApiController@std_info');
Route::get('/std/project','StudentApiController@std_project');
Route::get('/std/delete/project','StudentApiController@delete_project_std');
Route::post('/std/store/project','StudentApiController@store_project_std');
Route::post('/std/update/project','StudentApiController@update_project_std');
Route::get('/add/std_to_project/view','StudentApiController@add_std_to_project_view');
Route::post('/add/std/to_project','StudentApiController@add_std_to_project');
//-----------------------------------Teacher-----------------------------------------------------------
Route::get('/teacher/index','TeacherApiController@te_index');
Route::get('/teacher/info','TeacherApiController@te_info');
Route::get('/teacher/myproject','TeacherApiController@myproject');
Route::get('/teacher/projectsneeded','TeacherApiController@projectsneeded');
Route::get('/teacher/projects','TeacherApiController@te_projects');
Route::get('/add/project/teacher/{id}','TeacherApiController@add_project_teacher');
Route::get('/delete/project/teacher/{id}','TeacherApiController@delete_project_teahcer');
//-------------------------------Admin------------------------------------------------
Route::get('/admin/index','AdminApiController@admin_index');
Route::get('/admin/advertising','AdminApiController@admin_advertising');
Route::get('/add/advertising/view','AdminApiController@add_advertising_view');
Route::post('/add/advertising','AdminApiController@add_advertising');
Route::get('/update/advertising/view/{id}','AdminApiController@update_advertising_view');
Route::post('/update/advertising/{id}','AdminApiController@update_advertising');
Route::get('/delete/advertising/{id}','AdminApiController@delete_advertising');
//iam here
Route::get('/admin/projects','AdminApiController@admin_project');
Route::get('/admin/add/projects/view','AdminApiController@admin_add_project_view');
Route::post('/admin/add/projects','AdminApiController@admin_add_project');
Route::get('/admin/delete/project/{id}','AdminApiController@admin_delete_project');
Route::get('/admin/update/project/view/{id}','AdminApiController@admin_update_project_view');
Route::post('/admin/update/project/{id}','AdminApiController@admin_update_project');
Route::get('/admin/groups','AdminApiController@admin_groups');
Route::get('/admin/delete/std_form_group/{id}','AdminApiController@admin_delete_std_from_group');
Route::get('/admin/download/{id}',function ($id){

    $project = Project::find($id);

    $name = $project->filename;

    // $headers = array('Content_Type : application/image');
    return Storage::download(public_path(),$name);
});

Route::get('/add/std_to_group/view/{id}','AdminApiController@admin_add_std_to_group_view');
Route::post('/add/std_to_group/{id}','AdminApiController@admin_add_std_to_group');
Route::get('/admin/discussions','AdminApiController@admin_discussions');
Route::get('/admin/add/discussions/view','AdminApiController@add_discussions_view');
Route::post('/admin/add/discussions','AdminApiController@add_discussions');
Route::get('/delete/discussion/{id}','AdminApiController@delete_discussion');
Route::get('/update/discussions/view/{id}','AdminApiController@update_discussion_view');
Route::post('/update/discussions/{id}','AdminApiController@update_discussion');

