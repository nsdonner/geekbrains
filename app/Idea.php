<?php
/**
 * Created by PhpStorm.
 * User: palad
 * Date: 15.10.2017
 * Time: 18:35
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

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

    public function getIdeaById(int $id) {
        $ideas = Idea::leftJoin('users', 'ideas.id_author', '=', 'users.id')
            ->leftJoin('tasks', 'ideas.id_task', '=', 'tasks.id')
            ->select('ideas.id', 'ideas.name as name', 'ideas.description', 'ideas.technologies', 'ideas.competitors',
                'users.lastname as user_lastname', 'users.firstname as user_firstname',
                'users.middlename as user_middlename', 'users.email as user_email', 'users.name as user_name',
                'ideas.date_create as date_create', 'tasks.name as task', 'tasks.id as id_task')
            ->where('ideas.id','=', $id)
            ->get()->toArray();

        if (count($ideas) == 0) {
            return null;
        }
        else {
            return $ideas[0];
        }

    }

    public function getNewIdea() {
        $idea = [];

        $idea[0]['id'] = 0;
        $idea[0]['name'] = "";
        $idea[0]['description'] = "";
        $idea[0]['technologies'] = "";
        $idea[0]['competitors'] = "";
        $idea[0]['user_lastname'] = "";
        $idea[0]['user_firstname'] = "";
        $idea[0]['user_middlename'] = "";
        $idea[0]['user_email'] = "";
        $idea[0]['user_name'] = "";
        $idea[0]['date_create'] = Carbon::now();

        return $idea[0];
    }

    public function addIdea($name, $description, $technologies, $competitors, $id_task) {
        $objUser = new User();
        $current_user = $objUser->getCurrentUser();

        $objIdea = new Idea();
        $newId = $objIdea->insertGetId([
            'name' => $name,
            'description'=> $description,
            'technologies' => $technologies,
            'competitors' => $competitors,
            'id_author' => $current_user['id'],
            'id_task' => $id_task]);

        return $newId;
    }

    public function editIdea($id, $name, $description, $technologies, $competitors) {

        $objIdea = new Idea();
        $objIdea->where('id', $id)
            ->update([
                'name' => $name,
                'description'=> $description,
                'technologies' => $technologies,
                'competitors' => $competitors
            ]);

        return true;
    }
}