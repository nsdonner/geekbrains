<?php
/**
 * Created by PhpStorm.
 * User: palad
 * Date: 15.10.2017
 * Time: 18:35
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function getTypes() {
        $types = Type::select()->get()->toArray();

        return $types;
    }

    public function getDefaultType() {
        $types = Type::where('id','=', 1)->get()->toArray();

        return $types[0];
    }

    public function getTypeByName($name) {
        $types = Type::where('name','=', $name)->get()->toArray();

        return $types[0];
    }
}