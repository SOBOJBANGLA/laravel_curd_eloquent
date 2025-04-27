<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Hall;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$floors =Floor::all();
        $floors =Floor::where('created_by',auth()->id())->get();
        return view('floors.index',compact('floors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $halls =Hall::all();
        return view('floors.create',compact('halls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'hall_id'=>'required',
            'name'=>'required',
            'description'=>'required',
            'capacity'=>'required',
            'task'=>'required'
        ]);

        $data['created_by']=auth()->id();

        Floor::create($data);

        return redirect()->route('floors.index')->with('success','Floor Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Floor $floor)
    {
        $halls =Hall::all();
        return view('floors.edit',compact('halls','floor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Floor $floor)
    {
        $data = $request->validate([
            'hall_id'=>'required',
            'name'=>'required',
            'description'=>'required',
            'capacity'=>'required',
            'task'=>'required'
        ]);

        $data['created_by']=auth()->id();

        $floor->update($data);

        return redirect()->route('floors.index')->with('success','Floor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Floor $floor)
    {
        $floor->delete();

        return redirect()->route('floors.index')->with('success','Floor Deleted Successfully');
    }
}
