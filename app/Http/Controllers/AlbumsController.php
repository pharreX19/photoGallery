<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\Validator;
use function PHPSTORM_META\type;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all()->sortByDesc('updated_at');
        return view('albums',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Album $album)
    {
        $coverImageName = time().'.'.$request->coverImage->getClientOriginalExtension();

        $validatedData = $request->validate([
            'album'=> 'required', 'string', 'max:20',
            'description'=> 'required','string','max:255',
            'coverImage' => 'required','image','mimes:jpeg,png,jpg','max:2048'
        ]);

        $album = new Album;
        $album->name = $request->input('album');
        $album->description = $request->input('description');
        $album->cover_image = $coverImageName;
        $album->save();

        $request->coverImage->move(public_path('images'),$coverImageName);
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
        $album =  Album::with('images')->find($id);
        return view('album',compact('album'));
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
