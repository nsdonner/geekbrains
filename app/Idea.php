<?php
/**
 * Created by PhpStorm.
 * User: palad
 * Date: 15.10.2017
 * Time: 18:35
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    public function getIdeasByTask(int $id) {
        //$task = Task::where('id','=', $id)->get()->toArray();

        $ideas = Idea::leftJoin('users', 'ideas.id_author', '=', 'users.id')
            ->select('ideas.id', 'ideas.name as name', 'ideas.description', 'users.lastname as user_lastname',
                'users.firstname as user_firstname', 'users.middlename as user_middlename', 'users.email as user_email',
                'users.name as user_name', 'ideas.date_create as date_create', 'users.id as id_user')
            ->where('id_task','=', $id)
            ->where('is_deleted','=', 0)
            ->get()->toArray();

        //var_dump($task[0]);
        //echo "<br>";

        return $ideas;
    }
}