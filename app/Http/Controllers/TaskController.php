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
use Carbon\Carbon;
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
        $general['id_task'] = $arguments;
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

    public function add(Request $request) {

        if (isset($_POST['id']) && $_POST['id'] == 0) {

            $objTask = new Task();
            $newId = $objTask->addTask($_POST['name'], $_POST['description'], $_POST['status'], $_POST['deadline'], $_POST['type'], $_POST['id_project']);

            return $newId;//redirect('/task'.$newId)->with('status', 'Задача создана!');
        }
        elseif (isset($_POST['id']) && $_POST['id'] > 0) {
            $objTask = new Task();
            $success = $objTask->editTask($_POST['id'], $_POST['name'], $_POST['description'], $_POST['status'], $_POST['deadline'], $_POST['type'], $_POST['result']);

            if ($success == true)
                return $_POST['id'];//redirect('/task'.$_POST['id'])->with('status', 'Данные обновлены!');
            else
                return null;//redirect('/task'.$_POST['id'])->withErrors('Ошибка записи данных!');
        }
        return null;//redirect('/id'.Auth::id())->withErrors('Ошибка записи данных по причине отсутствия идентификационных данных!');
    }

    public function addComment() {
        if (isset($_POST['id']) && $_POST['id'] > 0) {
            if (isset($_POST['text']) && $_POST['text'] != "") {
                $objComment= new Comment();
                $newId = $objComment->addCommentToTask($_POST['id'], $_POST['text']);

                return $newId;
            }
            return null; //redirect('/note'.$_GET['id'])->withErrors('Необходимо ввести текст комментария!');
        }
        return null; //redirect('/id'.Auth::id())->withErrors('Ошибка записи данных по причине отсутствия идентификационных данных!');
    }

    public function dropComment() {
        if (isset($_POST['id_comment']) && $_POST['id_comment'] > 0) {
            $objComment= new Comment();
            $DelId = $objComment->deleteComment($_POST['id_comment']);

            return $DelId;
        }
        return null;//redirect('/task1')->withErrors('Ошибка записи данных!');//null;
    }

    public function dropIdea() {
        if (isset($_POST['id_idea']) && $_POST['id_idea'] > 0) {
            $objIdea= new Idea();
            $DelId = $objIdea->deleteIdea($_POST['id_idea']);

            return $DelId;
        }
        return null;//redirect('/task1')->withErrors('Ошибка записи данных!');//null;
    }

}
