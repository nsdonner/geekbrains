<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function getProjectById(int $id) {
        $projects = Project::select()->where('id','=', $id)->get()->toArray();

        if (count($projects) == 0)
            return null;
        else
            return $projects[0];
    }
}
