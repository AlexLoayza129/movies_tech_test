<?php
   
namespace App\Http\Controllers\API;
   
use App\Http\Controllers\Controller;
use App\Models\Movie;

class ApiMovieController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
    
        return response()->json($movies);
    }


    public function getMovie($id){
        $movie = Movie::findOrFail($id);

        return response()->json($movie);
    }
}
