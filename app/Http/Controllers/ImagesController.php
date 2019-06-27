<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $albumId = $id;
        return view('image-create',compact('albumId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {

        $imageName = time().'.'.$request->image->getClientOriginalExtension();

        $validatedData = $request->validate([
            'name'=> 'required', 'string', 'max:20',
            'description'=> 'required','string','max:255',
            'image' => 'required','image','mimes:jpeg,png,jpg','max:2048'
        ]);

        $image = new Image();
        $image->name = $request->input('name');
        $image->description = $request->input('description');
        $image->image = $imageName;
        $image->album_id=$id;
        $image->save();

        $request->image->move(public_path('images'),$imageName);
        return redirect('home')->with('success','new album created'); //return redirec('');
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
        //
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
        //
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
    }
}
