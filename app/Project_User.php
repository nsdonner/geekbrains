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
    public function UserDelete($user){
        Project_User::delete('id','=',$user);
        return 1;
    }
    public function AddKurator($user){
        Project_User::update(['is_kurator'=>1]);
        return 1;
    }
    public function GetProjectUsers($project,$invite="in") {
        $data = Project_User::select('name','id_project','id_user','is_kurator')
                ->rightJoin('users','users.id','=','id_user')
                ->where('invite','in')
                ->get()
                ->toArray();
        return $data;
    }
}
