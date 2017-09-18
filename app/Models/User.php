<?php
/**
 * Created by PhpStorm.
 * User: west3
 * Date: 17.09.2017
 * Time: 14:04
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;
class User
{
    function GetData($id) {
       // $sql = "SELECT * FROM users WHERE id=".$id;

        return DB::table('users')->where('id','=',$id)->get();
    }
}