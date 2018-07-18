<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Session;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->paginate(5);

        return view('task.index')->with('storedTasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'newTaskName' => 'required|min:5|max:191'
        ]);

        $task = new Task;

        $task -> name = $request -> newTaskName ;

        $task -> save();

        Session::flash('success', 'New Task Has Been Successfully Added.');

        return redirect()->route('task.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        if (!$task) {
            dd('AND HERE I AM HEHE BOIII, Edit Ver');
        }

        return view('task.edit')->with('underEdit', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'newEditTask' => 'required|min:5|max:191'
        ]);


        $task = Task::find($id);

        $task -> name = $request -> newEditTask ;

        $task -> save();

        Session::flash('success','Task #' . $id . ' Task Has Been Updated.');

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Task::find($id);
        $data -> delete();

        Session::flash('success', 'Task #'. $id .' is Successfully Deleted.');

        return redirect()->route('task.index');
    }
}
