<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helmet;

class HelmetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helmets = Helmet::all()->toArray();
        return view('helmet.index', compact('helmets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('helmet.create');
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

        $helmet = new Helmet([
            'brand' => $request->get('brand'),
            'model' => $request->get('model'),
        ]);

        $helmet->save();
        return redirect()->route('helmet.index')->with('success','Helmet Added');
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
        $helmet = Helmet::find($id);
        return view('helmet.edit',compact('helmet','id'));
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

        $helmet = Helmet::find($id);
        $helmet -> brand = $request -> get('brand');
        $helmet -> model = $request -> get('model');
        $helmet -> save();
        return redirect()->route('helmet.index')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $helmet = Helmet::find($id);
        $helmet->delete();
        return redirect()->route('helmet.index')->with('success','Data Deleted');
    }
}
