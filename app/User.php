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
