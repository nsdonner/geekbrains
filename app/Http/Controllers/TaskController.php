<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Task;
use App\Status;
use App\Type;
use App\Idea;
class TaskController extends Controller
{
    public function index(Request $request,$arguments) {

        //var_dump($request);
        //echo "<br>";
        //var_dump($arguments);
        //echo "<br>";

        $objTask = new Task();
        $info = $objTask->getTask($arguments);

        $author = TaskController::getAuthor($info['user_lastname'], $info['user_firstname'], $info['user_middlename'], $info['user_name']);

        $objStatuses = new Status();
        $statuses = $objStatuses->getStatusesForTask();

        $objTypes = new Type();
        $types = $objTypes->getTypes();

        $objIdeas = new Idea();
        $ideas = $objIdeas->getIdeasByTask($arguments);
        foreach ($ideas as $key => $v) {
            $mIdeas[$key]['id'] = $v['id'];
            $mIdeas[$key]['name'] = $v['name'];
            $mIdeas[$key]['description'] = $v['description'];
            $mIdeas[$key]['date_create'] = $v['date_create'];
            $mIdeas[$key]['author'] = TaskController::getAuthor($v['user_lastname'], $v['user_firstname'], $v['user_middlename'], $v['user_name']);
        }

        $data = ['info' => $info, 'statuses' => $statuses, 'author' => $author, 'types' => $types, 'ideas' => $mIdeas];

        return view('task.task',$data);
    }

    protected function getAuthor($user_lastname, $user_firstname, $user_middlename, $user_name) {
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
