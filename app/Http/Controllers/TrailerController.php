<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trailer;

class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trailers = Trailer::all()->toArray();
        return view('trailer.index', compact('trailers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trailer.create');
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
            'brand'        => 'required',
            'model'        => 'required'
        ]);

        $trailer = new Trailer([
            'brand' => $request->get('brand'),
            'model' => $request->get('model'),
        ]);

        $trailer->save();
        return redirect()->route('trailer.index')->with('success','Trailer Added');
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
        $trailer = Trailer::find($id);
        return view('trailer.edit',compact('trailer','id'));
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
            'brand' => 'required',
            'model' => 'required'
        ]);

        $trailer = Trailer::find($id);
        $trailer -> brand = $request -> get('brand');
        $trailer -> model = $request -> get('model');
        $trailer -> save();
        return redirect()->route('trailer.index')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trailer = Trailer::find($id);
        $trailer->delete();
        return redirect()->route('trailer.index')->with('success','Data Deleted');
    }
}
