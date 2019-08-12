<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
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
        $statuses = Status::all();

        return view('status.index',  ['statuses'=>$statuses]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        //

        $status = new Status();
        $status->name = $request->input('name');
        $status->save();

        session()->flash('alert-success', 'Status added!');

        return redirect(route('status.index'));
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
        $status = Status::find($id);

        return view('status.show', ['status'=>$status]);
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

        $status = Status::find($id);

        return view('status.edit', ['status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {
        //

        $status = Status::find($id);

        $status->name = $request->input('name');
        $status->save();

        return redirect(route('status.index'));
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

        $status = Status::find($id);
        $status->delete();

        session()->flash('alert-warning', 'Status deleted!');

        return redirect()->back();
    }
}
