<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
    public function index(){
        // $files = File::all();

        // return view('upload.index')->with('files',$files);
        return view('upload.index');
    }

    public function store(UploadRequest $request){
        $datos = $request->validate();
        
        // foreach($datos->file as $files){
        //     // $filename = time().'_'.$files->getClientOriginalName();
        //     // $filesize = $files->getSize();
        //     $files->storeAs('public/',$filename);

        //     $fileModel = new File;
        //     $fileModel->name = time().'_'.$files->getClientOriginalName();
        //     $fileModel->size = $files->getSize();
        //     $fileModel->location = 'storage/'.time().'_'.$files->getClientOriginalName();
        //     $fileModel->save();
        // }

        dd($datos);
        return redirect()->route('upload.index')->with('success','Subido Correctamente');
    }
}
