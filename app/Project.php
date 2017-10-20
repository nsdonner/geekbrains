<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project_User as ProjectUser;
class Project extends Model
{
    protected $fillable = ['name', 'description', 'id_author','id_status','date_create','invite'];
    public function getProjectById(int $id,$user) {
        $projects = Project::select()->where('id','=', $id)->get()->toArray();
        $member = new ProjectUser();
        $member = $member->GetUser($id,$user);
        if (!empty($projects) && $member == true)
            return $projects[0];
        else
            return [];
    }
    public function ProjectCreate($name,$desc,$author) {
        $project = Project::create(['name'=>$name,
            'description'=>$desc,
            'id_author'=>$author]);
        return $project->id;
    }
}
