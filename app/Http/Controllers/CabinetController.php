<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
class CabinetController extends Controller
{
    public function index(Request $request,$arguments) {
        $idcurrent = $arguments;
        if($request->method() == "POST"){
            $this->validate($request,[
               'name' => 'min:2|max:255',
               'email' => 'email|max:255'
            ]);

            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();

        }
        $data = ['id' => Auth::id(),'nameAuth' => Auth::user()->name];
        // Если эта страница авторизованного пользователя
        if(Auth::id() == $idcurrent ){
            // Дать права на изменения
            $model = User::findOrFail(Auth::id());
            $name =  $model->name;
            $email = $model->email;
            $photo = ($model->photo == null) ? "users/avatar.jpg" : $model->photo;
            $data += ['name' => $name,'email'=> $email,'photo' => $photo,'settings' => 1];
        }else {
            // Дать права на просмотр страницы
            $model = User::findOrFail($idcurrent);
            $name = $model->name;
            $photo = ($model->photo == null) ? "users/avatar.jpg" : $model->photo;
            $data += ['name' => $name,'photo' => $photo,'settings' => 0];
        }
        return view('cabinet.cabinet',$data);
    }

}
