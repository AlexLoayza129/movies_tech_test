<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'file' => 'required|max:10000'
        ];
        
        //Obtenemos el nombre del archivo
        $fileName = Str::random(5).'.'.$request->file->getClientOriginalName();

        $movie = new Movie();
        $movie->name = $request->name;
        $movie->date_of_publish = $request->date;
        $movie->img = $fileName;
        $movie->created_at = $request->date;
        $movie->save();

        //Save File
        Storage::disk('public')->put($fileName, $request->file);

        return redirect()->route('admin.movies.index');
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

        return view('admin.movies.edit', compact('id'));
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
        $movie = Movie::findOrFail($request->id);
        $movie->name = $request->name;
        $movie->date_of_publish = $request->date;
        $movie->save();

        return redirect()->route('admin.movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $movie = Movie::findOrFail($request->id);

        $movie->status = 0;
        $movie->save();

        return redirect()->route('admin.movies.index');
    }

    public function change(Request $request){
        $movie = Movie::findOrFail($request->id);

        $movie->active = $request->newStatus;
        $movie->save();

        return redirect()->route('admin.movies.index');
    }
}
