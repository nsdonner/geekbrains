<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Project;
use App\Project_User as ProjectUser;
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
            $invites = new ProjectUser();
            $invites = $invites->GetInvitesUser($idcurrent);
            if(!empty($invites))
                $data['invites'] = $invites;
            else
                $data['invites'] = [];
            $photo = ($model->photo == null) ? "users/avatar.jpg" : $model->photo;
            $data += ['name' => $name,'email'=> $email,'photo' => $photo,'project'=>$project,'settings' => 1];
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
                $project = new Project();
                $project = $project->ProjectCreate($data['ProjectName'],$data['ProjectLabel'],Auth::id());
                $ProjectUser = new ProjectUser();
                $ProjectUser->UserAdd($project,Auth::id(),$invite = "in",$kurator = 1);
                return redirect('/id'.Auth::id())->with('status','Проект успешно создан!');
            }
            return redirect('/id'.Auth::id())->withErrors('Проверьте данные!');
        }
        else {
            return redirect('/id'.Auth::id());
        }
    }
    public function ProjectInvite(){
        $id = $_REQUEST['id'];
        $invite = $_REQUEST['invite'];
        if($invite=="in"){
            $model = new ProjectUser();
            $data = $model->UpdateInviteUser($id,$invite,Auth::id());
            return "yes";
        }else{
            $model = new ProjectUser();
            $data = $model->UpdateInviteUser($id,$invite,Auth::id());
            return "no";
        }
    }
}
