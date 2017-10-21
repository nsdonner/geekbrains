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
class IdeaController extends Controller
{
    public function index(Request $request,$arguments) {

        $objUser = new User();
        $current_user = $objUser->getCurrentUser();

        if ($arguments > 0) {
            $objTask = new Idea();
            $info = $objTask->getIdeaById($arguments);

            if (!(isset($info))) {
                return redirect('/id'.Auth::id())->withErrors('Идея не найдена!');
            }

            $objComments = new Comment();
            $comments = $objComments->getCommentsByIdea($arguments);
            $mComments = [];
            foreach ($comments as $key => $v) {
                $mComments[$key]['id'] = $v['id'];
                $mComments[$key]['text'] = $v['text'];
                $mComments[$key]['date'] = $v['date'];
                $mComments[$key]['user'] = $objUser->getUserById($v['id_user']);
            }

            $isNew = false;
        }
        elseif ($arguments == 0) {
            $objIdea = new Idea();
            $info = $objIdea->getNewIdea();

            if (!(isset($_GET['id_task'])) || $_GET['id_task'] < 1) {
                return redirect('/id'.Auth::id())->withErrors('Идею можно создать только в контексте существующей задачи!');
            }

            $info['id_task'] = $_GET['id_task'];
            $objTask = new Task();
            $info['task'] = $objTask->getTask($info['id_task'])['name'];

            if (!(isset($info['task']))) {
                return redirect('/id'.Auth::id())->withErrors('Попыта создать идею в контексте несуществующей задачи!');
            }

            $mComments = [];
            $isNew = true;
        }

        $general['isNew'] = $isNew;
        $general['id_idea'] = $arguments;
        $js = '/js/idea.js';
        $author = $objUser->getUserInfo($info['user_lastname'], $info['user_firstname'], $info['user_middlename'], $info['user_name']);

        $data = ['info' => $info,
            'author' => $author,
            'currentUser' => $current_user,
            'comments' => $mComments,
            'general' => $general,
            'js' => $js];

        return view('idea.idea', $data);
    }

    public function add() {

        if (isset($_POST['id']) && $_POST['id'] == 0) {

            $objIdea = new Idea();
            $newId = $objIdea->addIdea($_POST['name'], $_POST['description'], $_POST['technologies'], $_POST['competitors'], $_POST['id_task']);

            return $newId; //edirect('/note'.$newId)->with('status', 'Идея создана!');
        }
        elseif (isset($_POST['id']) && $_POST['id'] > 0) {
            $objIdea= new Idea();
            $success = $objIdea->editIdea($_POST['id'], $_POST['name'], $_POST['description'], $_POST['technologies'], $_POST['competitors']);

            if ($success == true)
                return $_POST['id'];//redirect('/note'.$_GET['id'])->with('status', 'Данные обновлены!');
            else
                return null; //redirect('/note'.$_GET['id'])->withErrors('Ошибка записи данных!');
        }
        return null; //redirect('/id'.Auth::id())->withErrors('Ошибка записи данных по причине отсутствия идентификационных данных!');

    }

    public function addComment() {
        if (isset($_POST['id']) && $_POST['id'] > 0) {
            if (isset($_POST['text']) && $_POST['text'] != "") {
                $objComment= new Comment();
                $newId = $objComment->addCommentToIdea($_POST['id'], $_POST['text']);

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

}
