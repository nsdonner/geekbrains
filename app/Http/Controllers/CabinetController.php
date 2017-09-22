<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use FormBuilder as Form;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class CabinetController extends Controller
{
    public function index(Request $request,$arguments) {
        $id = $arguments;
        if($request->method() == "POST"){
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();
        }
        // Если эта страница авторизованного пользователя
        if(Auth::id() == $id ){
            // Дать права на изменения
            $model = User::findOrFail($id);
            $name =  $model->name;
            $email = $model->email;
            $photo = ($model->photo == null) ? "users/avatar.jpg" : $model->photo;
            $data=['id'=>$id, 'name' => $name,'email'=> $email,'photo' => $photo];
        }else{
            // Дать права на просмотр страницы
            $model = User::findOrFail($id);
            $name = $model->name;
            $photo = ($model->photo == null) ? "users/avatar.jpg" : $model->photo;
            $data = ['name' => $name,'photo' => $photo];
        }
        return view('cabinet.cabinet',$data);
    }

}
