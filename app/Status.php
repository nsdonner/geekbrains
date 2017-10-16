<?php
/**
 * Created by PhpStorm.
 * User: palad
 * Date: 15.10.2017
 * Time: 18:35
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function getStatusesForTask() {
        $statuses = Status::where('type','=', 2)->get()->toArray();

        return $statuses;
    }

    public function getDefaultStatusForTask() {
        $statuses = Status::where('id','=', 1)->get()->toArray();

        return $statuses[0];
    }
}