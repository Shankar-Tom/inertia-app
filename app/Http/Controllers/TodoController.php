<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    //
    public function list()
    {
        return inertia('Todos',[
            'todos'=>Task::where('user_id',Auth::id())->get()
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'task'=>'required'
        ]);
        Task::create([
            'user_id'=>auth()->id(),
            'task'=>$request->task
        ]);
        return redirect()->route('todos')->with(['status'=>true,'message'=>"Task added"]);
    }

    public function update_status(Request $request)
    {
        Task::find($request->id)->update(['status'=>true]);
        return redirect()->route('todos');
    }

    public function delete(Request $request)
    {
            Task::find($request->id)->delete();
            return redirect()->route('todos')->with(['status'=>false,'message'=>"Task delete"]);

    }
}
