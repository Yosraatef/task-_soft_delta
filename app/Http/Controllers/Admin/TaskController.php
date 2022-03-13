<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
    function __construct(Task $tasks)
    {
        $this->tasks = $tasks;
        $this->middleware('permission:show_tasks',['only' => 'index']);
        $this->middleware('permission:create_tasks',['only' => 'create','store']);
        $this->middleware('permission:edit_tasks',['only' => 'edit','update']);
    }
    public function index()
    {
        $members = User::all();
         
        return view('admin.tasks.index',compact('members'));
    }
    public function fetchtask()
    {
        $tasks = Task::with('user')->orderBy('id', 'DESC')->get();
        
        return response()->json([
            'tasks'=>$tasks,
        ]);
    }
    public function create()
    {
       
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date'=> 'required|date|after:yesterday',
            'user_id'=>'required|exists:users,id',
            'description'=>'required|min:10|max:100',
            
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $task = new Task;
            $task->date = $request->input('date');
            $task->user_id = $request->input('user_id');
            $task->description = $request->input('description');
            $task->save();
            return response()->json([
                'status'=>200,
                'message'=>'task Added Successfully.'
            ]);
        }
    }

   public function done($id)
   {
        // dd('ff');
        $task = Task::find($id);
        if($task){
            if($task->done == 0)
            {  
                $task->done = 1;
                $task->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Make Task done..'
                ]);
            }
            else
            {
                $task->done = 0;
                $task->save();
                return response()->json([
                    'status'=>404,
                    'message'=>'Make Task not done..'
                ]);
            }
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No Task..'
            ]);
        }
       
   }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
