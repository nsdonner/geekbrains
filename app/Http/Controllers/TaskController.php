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

        $objTask = new Task();
        $info = $objTask->getTask($arguments);

        $author = $objUser->getUserInfo($info['user_lastname'], $info['user_firstname'], $info['user_middlename'], $info['user_name']);

        $objStatuses = new Status();
        $statuses = $objStatuses->getStatusesForTask();

        $objTypes = new Type();
        $types = $objTypes->getTypes();

        $objIdeas = new Idea();
        $ideas = $objIdeas->getIdeasByTask($arguments);
        $mIdeas = [];
        foreach ($ideas as $key => $v) {
            $mIdeas[$key]['id'] = $v['id'];
            $mIdeas[$key]['name'] = $v['name'];
            $mIdeas[$key]['description'] = $v['description'];
            $mIdeas[$key]['date_create'] = $v['date_create'];
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

        $data = ['info' => $info,
            'statuses' => $statuses,
            'author' => $author,
            'types' => $types,
            'ideas' => $mIdeas,
            'currentUser' => $current_user,
            'comments' => $mComments];

        return view('task.task',$data);
    }

}
