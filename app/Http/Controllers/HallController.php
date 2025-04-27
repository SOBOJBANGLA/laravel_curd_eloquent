<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$halls =Hall::all();
        $halls =Hall::where('created_by',auth()->id())->get();
        return view('halls.index',compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'image'=>'nullable|image',
            'address'=>'required',
            'contact_info'=>'required',
        ]);

        $data['created_by']=auth()->id();

        if($request->hasFile('image')){
            $data['image']=$request->file('image')->store('halls','public');

        }

        Hall::create($data);

        return redirect()->route('halls.index')->with('success','Hall Created Successfully');
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
    public function edit(Hall $hall)
    {
        return view('halls.edit',compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hall $hall)
    {
        $data = $request->validate([
            'name'=>'required',
            'image'=>'nullable|image',
            'address'=>'required',
            'contact_info'=>'required',
        ]);

        $data['created_by']=auth()->id();

        if($request->hasFile('image')){
            $data['image']=$request->file('image')->store('halls','public');

        }

        $hall->update($data);

        return redirect()->route('halls.index')->with('success','Hall Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();

        return redirect()->route('halls.index')->with('success','Hall Deleted Successfully');
    }
}
