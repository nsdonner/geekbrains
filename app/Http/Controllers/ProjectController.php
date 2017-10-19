<?php

namespace App\Http\Controllers;

use App\Project_User;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Project;
use App\Project_User as ProjectUser;

class ProjectController extends Controller
{
    public function index(Request $request, $arguments)
    {
        $project = new Project();
        $project = $project->getProjectById($arguments);
        $projectUsers = new ProjectUser();
        $members = $projectUsers->GetProjectUsers($arguments);
        return view('project.project', compact('members', 'project'));
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
