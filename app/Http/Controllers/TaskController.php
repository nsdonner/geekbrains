<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Task;
use App\Status;
use App\Type;
class TaskController extends Controller
{
    public function index(Request $request,$arguments) {

        //var_dump($request);
        //echo "<br>";
        //var_dump($arguments);
        //echo "<br>";

        $objTask = new Task();
        $info = $objTask->getTask($arguments);

        $author = "";
        if ($info['user_lastname'] == null || $info['user_firstname'] == null || $info['user_middlename'] == null ||
            $info['user_lastname'] == "" || $info['user_firstname'] == "" || $info['user_middlename'] == "") {
            $author = $info['user_name'];
        }
        else {
            $author = $info['user_lastname']." ".substr($info['user_firstname'], 1,1).".".substr($info['user_middlename'],1,1).".";
        }

        $objStatuses = new Status();
        $statuses = $objStatuses->getStatusesForTask();

        $objTypes = new Type();
        $types = $objTypes->getTypes();

        $data = ['info' => $info, 'statuses' => $statuses, 'author' => $author, 'types' => $types];

        //var_dump($data['info']['name']);
        //echo "<br>";

        return view('task.task',$data);
    }

}
