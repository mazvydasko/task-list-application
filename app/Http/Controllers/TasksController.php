<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksRequest;
use App\Status;
use App\Task;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index()
    {
        //

        $status_id = 0;

        if ($findQuery = request()->query('status')){
            $status = Status::where('name', $findQuery)->first();
            $status_id = $status->id;
        }

        if ($status_id) {
            $tasks = Task::where('status_id', $status_id)->orderBy('created_at', 'desc')->get();
        } else {
            $tasks = Task::orderBy('created_at', 'desc')->get();
        }

        $statuses = Status::all();

        return view('tasks.index',  ['tasks'=>$tasks, 'statuses'=>$statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $statuses = Status::all();

        return view('tasks.create', ['statuses'=>$statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TasksRequest $request)
    {
        //

        $task = new Task();
        $task->task_name = $request->input('name');
        $task->task_description = $request->input('description');
        $task->status_id = $request->input('status');

        if($request->input('status') == 2 && $task->completed_date == null) {
            $task->completed_date = DB::raw('now()');
        } elseif ($request->input('status') == 2 && $task->completed_date != null) {
            $task->completed_date = $task->completed_date;
        } else {
            $task->completed_date = null;
        }

        $task->save();

        session()->flash('alert-success', 'Task added!');

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $task = Task::find($id);

        return view('tasks.show', ['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::find($id);
        $statuses = Status::all();

        return view('tasks.edit', ['task'=>$task, 'statuses'=>$statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TasksRequest $request, $id)
    {
        //
        $task = Task::find($id);
        $task->task_name = $request->input('name');
        $task->task_description = $request->input('description');
        $task->status_id = $request->input('status');


        if($request->input('status') == 2 && $task->completed_date == null) {
            $task->completed_date = DB::raw('now()');
        } elseif ($request->input('status') == 2 && $task->completed_date != null) {
            $task->completed_date = $task->completed_date;
        } else {
            $task->completed_date = null;
        }

        $task->save();



        session()->flash('alert-success', 'Task updated!');

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $task = Task::find($id);
        $task->delete();

        session()->flash('alert-warning', 'Task deleted!');

        return redirect()->back();
    }
}
