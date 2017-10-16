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

        var_dump($arguments);
        $data = ["id" => $arguments];

        return view('idea.idea',$data);
    }


}
