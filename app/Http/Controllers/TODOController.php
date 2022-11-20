<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Validator;

class TODOController extends Controller
{
    public function dashboard(Request $request){
        return view('dashboard');
    }

    public function addTask(Request $request){
       
        return view('add_task');
    }

    public function save(Request $request){
        $rules = array(
            'tname' => 'required',
            't_assigne' => 'required',
            'start_date'=>'required',
            'end_date'=>'required|after_or_equal:start_date'
        );    
        $messages = array(
            'tname.required' => 'Task Name is required.',
            't_assigne.required' => 'Task Assignee is required.',
            'start_date.required' => 'Start Date is required.',
            'end_date.required' => 'End Date is required.'
        );

        $this->validate($request, $rules, $messages);
         
        $task = new Task();

        $task->task_name = $request->tname;
        $task->task_assignee = $request->t_assigne;
        $task->task_startdate = $request->start_date;
        $task->task_enddate = $request->end_date;
        $task->status = 0;
        $task->save();
        return back()->with('success','New Task Created Successfully');
    }

    public function listOfTask(Request $request)
    {
       $task_list= Task::all(); 
       $list['data']=$task_list;
       $list['title'] = "All Tasks";
        return view('list_task',$list);
    }
    
    public function delete(Request $request, $id){
        $id=$id;
        Task::find($id)->delete();
    }

    public function update (Request $request, $status, $id){
        $update = array(
            'status' => $status
        );
        Task::whereId($id)->update($update);
    }

    public function listOfPendingTask(Request $request){
        $list['data'] = Task::where('status', 1)->get();
        $list['title'] = "Pending Tasks";
        return view('list_task',$list);
    }

    public function listOfCompletedTask(Request $request){
        $list['data'] = Task::where('status', 2)->get();
        $list['title'] = "Completed Tasks";
        return view('list_task',$list);
    }

}
