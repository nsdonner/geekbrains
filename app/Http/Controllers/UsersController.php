<?php
/**
 * Created by PhpStorm.
 * User: west3
 * Date: 17.09.2017
 * Time: 13:38
 */

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    function index(Request $request) {
        $model = new User();
        $data = $model->GetData(1);
        $first_name = $data[0]->first_name;
        $last_name = $data[0]->last_name;
        $password = $data[0]->password;
        //dump($data);
        //$user = 5;
        //$id = $request->id;
       // $passwords = ["key1"=>"value1","key2"=>"value2","key3"=>"value3","key4"=>"value4"];
        return view('user',compact('first_name','password','last_name'));
    }

}