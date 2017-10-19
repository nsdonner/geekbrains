<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'id_author','id_status','date_create','invite'];
    public function getProjectById(int $id) {
        $projects = Project::select()->where('id','=', $id)->get()->toArray();

        if (count($projects) == 0)
            return null;
        else
            return $projects[0];
    }
    public function ProjectCreate($name,$desc,$author) {
        $project = Project::create(['name'=>$name,
            'description'=>$desc,
            'id_author'=>$author]);
        return $project->id;
    }
}
