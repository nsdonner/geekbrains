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

        //var_dump($statuses);
        //echo "<br>";

        return $types;
    }
}