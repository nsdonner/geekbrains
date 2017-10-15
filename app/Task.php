<?php
/**
 * Created by PhpStorm.
 * User: palad
 * Date: 15.10.2017
 * Time: 18:35
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function getTask(int $id) {
        //$task = Task::where('id','=', $id)->get()->toArray();

        $task = Task::leftJoin('statuses', 'tasks.id_status', '=', 'statuses.id')
            ->leftJoin('users', 'tasks.id_author', '=', 'users.id')
            ->leftJoin('types', 'tasks.id_type', '=', 'types.id')
            ->leftJoin('projects', 'tasks.id_project', '=', 'projects.id')
            ->select('tasks.id', 'tasks.name as name', 'tasks.description', 'tasks.result', 'statuses.name as status',
                'tasks.deadline as deadline', 'users.lastname as user_lastname', 'users.firstname as user_firstname',
                'users.middlename as user_middlename', 'users.email as user_email', 'users.name as user_name',
                'tasks.date_create as date_create', 'types.name as type', 'projects.name as project')
            ->where('tasks.id','=', $id)
            ->get()->toArray();

        //var_dump($task[0]);
        //echo "<br>";

        return $task[0];
    }
}