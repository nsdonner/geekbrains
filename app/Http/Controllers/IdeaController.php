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

        if (isset($_GET['id']) && $_GET['id'] == 0) {

            $objIdea = new Idea();
            $newId = $objIdea->addIdea($_GET['name'], $_GET['description'], $_GET['technologies'], $_GET['competitors'], $_GET['id_task']);

            return redirect('/note'.$newId)->with('status', 'Идея создана!');
        }
        elseif (isset($_GET['id']) && $_GET['id'] > 0) {
            $objIdea= new Idea();
            $success = $objIdea->editIdea($_GET['id'], $_GET['name'], $_GET['description'], $_GET['technologies'], $_GET['competitors']);

            if ($success == true)
                return redirect('/note'.$_GET['id'])->with('status', 'Данные обновлены!');
            else
                return redirect('/note'.$_GET['id'])->withErrors('Ошибка записи данных!');
        }
        return redirect('/id'.Auth::id())->withErrors('Ошибка записи данных по причине отсутствия идентификационных данных!');

    }

    public function addComment() {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (isset($_GET['text']) && $_GET['text'] != "") {
                $objComment= new Comment();
                $newId = $objComment->addCommentToIdea($_GET['id'], $_GET['text']);

                return $newId;
            }
            return redirect('/note'.$_GET['id'])->withErrors('Необходимо ввести текст комментария!');
        }
        return redirect('/id'.Auth::id())->withErrors('Ошибка записи данных по причине отсутствия идентификационных данных!');
    }

}
