<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\TaskCreateRequest;
use App\Http\Requests\Dashboard\Admin\TaskUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Task;
use App\Models\Project;
use App\Models\Phase;
use App\Models\EmployeeProject;

class TaskController extends Controller
{
    public function CreatePost($id,TaskCreateRequest $request)
    {
        $data = array_merge($request->validated(), [
            'project_id' => $id,
        ]);

        $post = new Task($data);
        $post->save();
        return redirect()->back()->with('info', 'مسئولیت جدید اضافه شد ' );
    }
    

    public function DeletePost($id){
        $post = Task::find($id);
        $post->delete();
        return redirect()->back()->with('info', 'مسئولیت پاک شد');
    }

    public function GetTask($id)
    {
        $task=Task::find($id);
        $project = Project::where('id', $task->project_id)->FIRST();
        $phase = Phase::where('project_id',$project->id)->get();
        $users=EmployeeProject::where('project_id',$project->id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.employee.task.show', [
            'task' => $task,'phase' => $phase,'users' => $users,'post' => $project
        ]);
    }

    public function UpdatePost($id,TaskUpdateRequest $request)
    {
        $post = Task::find($request->input('id'));
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->fill($request->validated());
            $post->save();
            if (!empty($post->for) && $post->status == 'done' && $old_status != $post->status)
                $post->applyEmployeeScore($post->for);
        }
        return redirect()->back()->with('info', 'مسئولیت ویرایش شد');
    }

}
