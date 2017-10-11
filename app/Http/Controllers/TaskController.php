<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
class TaskController extends Controller
{
    public function index(Request $request,$arguments) {

        $data = [];
        return view('task.task',$data);
    }

}
