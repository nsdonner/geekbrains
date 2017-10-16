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
use App\Project;
use App\Comment;
class TaskController extends Controller
{
    public function index(Request $request,$arguments) {

        //var_dump($request);
        //echo "<br>";
        //var_dump($arguments);
        //echo "<br>";

        $objUser = new User();
        $current_user = $objUser->getCurrentUser();

        $objStatuses = new Status();
        $statuses = $objStatuses->getStatusesForTask();

        $objTypes = new Type();
        $types = $objTypes->getTypes();

        if ($arguments > 0) {
            $objTask = new Task();
            $info = $objTask->getTask($arguments);

            $objIdeas = new Idea();
            $ideas = $objIdeas->getIdeasByTask($arguments);
            $mIdeas = [];
            foreach ($ideas as $key => $v) {
                $mIdeas[$key]['id'] = $v['id'];
                $mIdeas[$key]['name'] = $v['name'];
                $mIdeas[$key]['description'] = $v['description'];
                $mIdeas[$key]['date_create'] = $v['date_create'];
                $mIdeas[$key]['id_user'] = $v['id_user'];
                $mIdeas[$key]['author'] = $objUser->getUserInfo($v['user_lastname'], $v['user_firstname'], $v['user_middlename'], $v['user_name']);
            }

            $objComments = new Comment();
            $comments = $objComments->getCommentsByTask($arguments);
            $mComments = [];
            foreach ($comments as $key => $v) {
                $mComments[$key]['id'] = $v['id'];
                $mComments[$key]['text'] = $v['text'];
                $mComments[$key]['date'] = $v['date'];
                $mComments[$key]['user'] = $objUser->getUserById($v['id_user']);
            }

            $participants = $objUser->getUsersByTask($arguments);

            $isNew = false;
        }
        elseif ($arguments == 0) {
            $objTask = new Task();
            $info = $objTask->getNewTask();

            if (!(isset($_GET['id_project'])) || $_GET['id_project'] < 1) {
                return redirect('/id'.Auth::id())->withErrors('Задачу можно создать только в контексте существующего проекта!');
            }

            $info['id_project'] = $_GET['id_project'];
            $objProject = new Project();
            $info['project'] = $objProject->getProjectById($info['id_project'])['name'];

            if (!(isset($info['project']))) {
                return redirect('/id'.Auth::id())->withErrors('Попыта создать задачу в контексте несуществующего проекта!');
            }

            $mIdeas = [];
            $mComments = [];
            $participants = [];
            $isNew = true;
        }

        $general['isNew'] = $isNew;
        $js = '/js/task.js';

        $author = $objUser->getUserInfo($info['user_lastname'], $info['user_firstname'], $info['user_middlename'], $info['user_name']);

        $data = ['info' => $info,
            'statuses' => $statuses,
            'author' => $author,
            'types' => $types,
            'ideas' => $mIdeas,
            'currentUser' => $current_user,
            'comments' => $mComments,
            'participants' => $participants,
            'number_participants' => count($participants),
            'general' => $general,
            'js' => $js];

        return view('task.task',$data);
    }

    public function add() {
        return redirect('/id'.Auth::id())->with('status', 'Задача создана!');
    }

}
