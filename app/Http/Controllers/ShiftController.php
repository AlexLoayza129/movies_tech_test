<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.shifts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift = new Shift();
        $shift->time = $request->time;
        $shift->movie_name = $request->name;
        $shift->active = (isset($request->isActive) && $request->isActive == true) ? 1 : 0;
        $shift->created_at = Carbon::now();
        $shift->save();

        return redirect()->route('admin.shifts.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        return view('admin.shifts.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $shift = Shift::findOrFail($request->id);
        $shift->time = $request->time;
        $shift->active = (isset($request->isActive) && $request->isActive == true) ? 1 : 0;
        $shift->save();

        return redirect()->route('admin.shifts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $shift = Shift::findOrFail($request->id);

        $shift->status = 0;
        $shift->save();

        return redirect()->route('admin.shifts.index');

    }

    public function change(Request $request){
        $shift = Shift::findOrFail($request->id);

        $shift->active = $request->newStatus;
        $shift->save();

        return redirect()->route('admin.shifts.index');
    }
}
