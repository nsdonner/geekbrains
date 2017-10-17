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
            /*$objTask = new Task();
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
            $isNew = true;*/
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


}
