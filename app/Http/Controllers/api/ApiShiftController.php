<?php
   
namespace App\Http\Controllers\API;
   
use App\Http\Controllers\Controller;
use App\Models\Shift;

class ApiShiftController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = Shift::all();
    
        return response()->json($shifts);
    }


    public function getShift($id){
        $shift = Shift::findOrFail($id);

        return response()->json($shift);
    }
}
