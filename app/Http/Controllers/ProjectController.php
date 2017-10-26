<?php

namespace App\Http\Controllers;

use App\Project_User;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Task;
use App\Project;
use App\Project_User as ProjectUser;

class ProjectController extends Controller
{
    public function index(Request $request, $arguments)
    {
        $project = new Project();
        $project = $project->getProjectById($arguments,Auth::id());
        if(!empty($project)) {
            $projectUsers = new ProjectUser();
            $kurator = $projectUsers->isKurator(Auth::id(),$project['id']);
            $members = $projectUsers->GetProjectUsers($arguments);
            $tasks = new Task();
            $tasks = $tasks->TasksForProject($project);
            return view('project.project', compact('members', 'project','tasks','kurator'));
        }else {
            return abort(404);
        }
    }

    public function MemberInvite(Request $request, $arguments)
    {
        if ($request->method() == "POST") {
            $data = $this->validate($request, ['inviteUser' => 'required|numeric']);
            $newmember = new ProjectUser();
            $newmember = $newmember->UserAdd($arguments, $data['inviteUser'], $invite = "soon", $kurator = 0);
            if ($newmember)
                return redirect('/project/' . $arguments)->with('status', 'Вы пригласили участника');
        } else
            return redirect('/project/' . $arguments);
    }
}
