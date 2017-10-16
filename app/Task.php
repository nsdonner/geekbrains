<?php
/**
 * Created by PhpStorm.
 * User: palad
 * Date: 15.10.2017
 * Time: 18:35
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;
use App\Type;
use Carbon\Carbon;

class Task extends Model
{
    public function getTask(int $id) {
        $task = Task::leftJoin('statuses', 'tasks.id_status', '=', 'statuses.id')
            ->leftJoin('users', 'tasks.id_author', '=', 'users.id')
            ->leftJoin('types', 'tasks.id_type', '=', 'types.id')
            ->leftJoin('projects', 'tasks.id_project', '=', 'projects.id')
            ->select('tasks.id', 'tasks.name as name', 'tasks.description', 'tasks.result', 'statuses.name as status',
                'tasks.deadline as deadline', 'users.lastname as user_lastname', 'users.firstname as user_firstname',
                'users.middlename as user_middlename', 'users.email as user_email', 'users.name as user_name',
                'tasks.date_create as date_create', 'types.name as type', 'projects.name as project', 'projects.id as id_project')
            ->where('tasks.id','=', $id)
            ->get()->toArray();


        return $task[0];
    }

    public function getNewTask() {
        $task = [];

        $task[0]['id'] = 0;
        $task[0]['name'] = "";
        $task[0]['description'] = "";
        $task[0]['result'] = "";

        $objStatus = new Status();
        $task[0]['status'] = $objStatus->getDefaultStatusForTask()['name'];
        $task[0]['deadline'] = Carbon::tomorrow();
        $task[0]['user_lastname'] = "";
        $task[0]['user_firstname'] = "";
        $task[0]['user_middlename'] = "";
        $task[0]['user_email'] = "";
        $task[0]['user_name'] = "";
        $task[0]['date_create'] = Carbon::now();

        $objType = new Type();
        $task[0]['type'] = $objType->getDefaultType()['name'];

        return $task[0];
    }
}