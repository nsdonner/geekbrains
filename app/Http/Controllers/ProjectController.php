<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
class ProjectController extends Controller
{
    public function index(Request $request,$arguments){

        return view('project.project',[]);
    }
}
