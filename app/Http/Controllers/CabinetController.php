<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Project;
class CabinetController extends Controller
{
    public function index(Request $request,$arguments) {
        $idcurrent = $arguments;
        if($request->method() == "POST"){
            if($request->has('name','email'))
            {
                $data = validate($request, [
                    'name' => 'required|min:2|max:255',
                    'email' => 'email|max:255'
                ]);
                $user = Auth::user();
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->update();
            }
        }
        // Если эта страница авторизованного пользователя
        if(Auth::id() == $idcurrent ){
            // Дать права на изменения
            $model = User::findOrFail(Auth::id());
            $name =  $model->name;
            $email = $model->email;
            $projects = Project::where('id_author','=',Auth::id())->get()->toArray();
            if(!empty($projects)){
                foreach($projects as $v)
                {
                    $project[$v['id']]['ProjectName'] = $v['name'];
                    $project[$v['id']]['ProjectDesc'] = $v['description'];
                }
            }else{
                $project = 0;
            }
            $photo = ($model->photo == null) ? "users/avatar.jpg" : $model->photo;
            $data = ['name' => $name,'email'=> $email,'photo' => $photo,'project'=>$project,'settings' => 1];
        }else {
            // Дать права на просмотр страницы
            $model = User::findOrFail($idcurrent);
            $name = $model->name;
            $photo = ($model->photo == null) ? "users/avatar.jpg" : $model->photo;
            $data = ['name' => $name,'photo' => $photo,'project'=>0,'settings' => 0];
        }
        return view('cabinet.cabinet',$data);
    }
    public function CreateProject(Request $request) {

        if($request->method() == "POST"){
            if($request->has('ProjectName','ProjectLabel')){
                $data=$this->validate($request,[
                   'ProjectName'=>'required|max:32|min:1',
                   'ProjectLabel'=>'max:255'
                ]);
                Project::insert(['name'=>$data['ProjectName'],
                                'description'=>$data['ProjectLabel'],
                                'id_author'=>Auth::id()]);
                return redirect('/id'.Auth::id())->with('status','Проект успешно создан!');
            }
            return redirect('/id'.Auth::id())->withErrors('Проверьте данные!');
        }
        else {
            return redirect('/id'.Auth::id());
        }
    }
}
