<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    const DIR_IMG = '/img/users/user_';
    const IMG_DEFAULT = '0.jpg';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function getCurrentUser() {
        $currentUser = User::findOrFail(Auth::id())->toArray();

        $currentUser['info'] = User::getUserInfo($currentUser['lastname'], $currentUser['firstname'], $currentUser['middlename'], $currentUser['name']);
        if (!(isset($currentUser['photo'])) || $currentUser['photo'] == '') {
            $currentUser['photo'] = User::IMG_DEFAULT;
        }

        $currentUser['photo'] = User::DIR_IMG.$currentUser['photo'];

        return $currentUser;
    }

    public function getUserById(int $id) {
        $User = User::findOrFail($id)->toArray();

        $User['info'] = User::getUserInfo($User['lastname'], $User['firstname'], $User['middlename'], $User['name']);
        if (!(isset($User['photo'])) || $User['photo'] == '') {
            $User['photo'] = User::IMG_DEFAULT;
        }

        $User['photo'] = User::DIR_IMG.$User['photo'];

        return $User;
    }

    public function getUsersByTask(int $id_task) {
        $Users = User::rightJoin('task_users', 'task_users.id_user', '=', 'users.id')
            ->select('users.id as id_user', 'task_users.total_voices as total_voices', 'task_users.is_kurator as is_kurator')
            ->where('task_users.id_task','=', $id_task)
            ->get()->toArray();

        $mUsers = [];
        foreach ($Users as $Key => $User) {
            $mUsers[$Key]['id_user'] = $User['id_user'];
            $mUsers[$Key]['total_voices'] = $User['total_voices'];
            $mUsers[$Key]['is_kurator'] = $User['is_kurator'];

            $objUser = User::findOrFail($User['id_user'])->toArray();
            $mUsers[$Key]['info'] = User::getUserInfo($objUser['lastname'], $objUser['firstname'], $objUser['middlename'], $objUser['name']);
        }

        return $mUsers;
    }

    public function getUsersByProject(int $id_project) {
        $Users = User::rightJoin('project_users', 'project_users.id_user', '=', 'users.id')
            ->select('users.id as id_user')
            ->where('project_users.id_project','=', $id_project)
            ->get()->toArray();

        $mUsers = [];
        foreach ($Users as $Key => $User) {
            $mUsers[$Key]['id_user'] = $User['id_user'];

            $objUser = User::findOrFail($User['id_user'])->toArray();
            $mUsers[$Key]['info'] = User::getUserInfo($objUser['lastname'], $objUser['firstname'], $objUser['middlename'], $objUser['name']);
        }

        return $mUsers;
    }

    public function getUserInfo($user_lastname, $user_firstname, $user_middlename, $user_name) {
        if (!(isset($user_lastname)) || !(isset($user_firstname)) || !(isset($user_middlename)) ||
            $user_lastname == "" || $user_firstname == "" || $user_middlename == "") {
            $author = $user_name;
        }
        else {
            $author = $user_lastname." ".mb_substr($user_firstname, 0,1, "UTF-8").".".mb_substr($user_middlename,0,1, "UTF-8").".";
        }

        return $author;
    }

}
