<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function storetask(Request $request){
        // dd($request->all());

        $taskObj = new Task;

        $taskObj->taskType = $request->taskType;
        $taskObj->taskName = $request->taskName;

        try {
            // $data = $request->validated();
            $taskObj->save();
            return redirect()->back()->with('message', 'Task Created Successfully');
          } catch (\Exception $ex) {
            return redirect()->back()->with('message', 'somthing went wrong' . $ex);
          }
    }

    public function updatetask($id){

        $task = Task::find($id);    
        $task ->isCompleted = 1;
        $task->save();
        return redirect()->back();
    }

    public function updateNottask($id){

        $task = Task::find($id);    
        $task ->isCompleted = 0;
        $task->save();
        return redirect()->back();
    }

    public function deletetask($id){

        $task = Task::find($id);    
       
        $task->delete();
        return redirect()->back();
    }
}

