<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_User extends Model
{
    protected $table = 'project_users';

    public function UserAdd($project,$user,$invite,$kurator=0) {
        Project_User::insert([
            'id_project' => $project,
            'id_user' => $user,
            'is_kurator' => $kurator,
            'invite'=>$invite
        ]);
        return 1;
    }
    public function GetUser($project,$user,$invite ='in'){
        $data = Project_User::select()
            ->where('invite',$invite)
            ->where('id_project',$project)
            ->where('id_user',$user)
            ->get()
            ->toArray();
        if(!empty($data))
            return true;
        else
            return false;
    }
    public function UserDelete($user){
        Project_User::delete('id','=',$user);
        return 1;
    }
    public function AddKurator($user){
        Project_User::update(['is_kurator'=>1]);
        return 1;
    }
    public function isKurator($user,$project){
        $kurator = Project_User::select('is_kurator')
                                ->where('id_user',$user)
                                ->where('id_project',$project)
                                ->get()->toArray();
        return $kurator[0]['is_kurator'];
    }
    public function GetProjectUsers($project,$invite="in") {
        $data = Project_User::select('name','id_project','id_user','is_kurator')
                ->rightJoin('users','users.id','=','id_user')
                ->where('invite',$invite)
                ->where('id_project',$project)
                ->get()
                ->toArray();
        return $data;
    }
    public function GetInvitesUser($user,$invite='soon'){
        $data = Project_User::select('id_project','projects.name as ProjectName','users.name as NameInviter')
                            ->rightJoin('projects','project_users.id_project','=','projects.id')
                            ->rightJoin('users','projects.id_author','=','users.id')
                            ->where('id_user',$user)
                            ->where('invite',$invite)
                            ->orderBy('id_project')
                            ->get()
                            ->toArray();
        return $data;
    }
    public function UpdateInviteUser($project,$invite,$user){
        $data = Project_User::where('id_project',$project)
                            ->where('id_user',$user)
                            ->update(['invite'=>$invite])
        ;
        return $data;
    }
}
