<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bike;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = Bike::all()->toArray();
        return view('bike.index', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bike.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'frame_number' => 'required',
            'brand'        => 'required',
            'model'        => 'required',
            ]);

        $bike = new Bike([
            'frame_number' => $request->get('frame_number'),
            'brand' => $request->get('brand'),
            'model' => $request->get('model'),
        ]);

        $bike->save();
        return redirect()->route('bike.index')->with('success','Bike Added');
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
    public function edit($id)
    {
        $bike = Bike::find($id);
        return view('bike.edit',compact('bike','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'frame_number' => 'required',
            'brand' => 'required',
            'model' => 'required',
        ]);

        $bike = Bike::find($id);
        $bike -> frame_number = $request -> get('frame_number');
        $bike -> brand = $request -> get('brand');
        $bike -> model = $request -> get('model');
        $bike -> save();
        return redirect()->route('bike.index')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bike = Bike::find($id);
        $bike->delete();
        return redirect()->route('bike.index')->with('success','Data Deleted');
    }
}
