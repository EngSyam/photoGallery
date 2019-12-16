<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index(){
        return view('albums.index');
    }
    public function create(){
        return view('albums.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);
        //Get FileName with Extention
        $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
        //Get just the file name
        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //Get File Extention
        $Extension = $request->file('cover_image')->getClientOriginalExtension();
        //create new file name
        $fileNameToStore = $fileName.'_'.time().rand(1000,1000000).'.'.$Extension;
        //uploading Image
        $path = $request->file('cover_image')->storeAs('public/album_covers',$fileNameToStore);
        return $path;
    }
}
