<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index(){
        // $files = File::all();

        // return view('upload.index')->with('files',$files);
        return view('upload.index');
    }

    public function store(UploadRequest $request){
        $datos = $request->validated();
        
            $filename = time().'_'.$datos['file']->getClientOriginalName();
            $filesize = $datos['file']->getSize();
            $datos['file']->storeAs('public/',$filename);

            $fileModel = new File;
            $fileModel->name = $filename;
            $fileModel->size = $filesize;
            $fileModel->location = 'storage/'.$filename;
            $fileModel->save();

        return redirect()->route('upload.index')->with('success','Subido Correctamente');
        // return redirect()->route('upload.index')->with('success',$filename);
    }

    //Descargar el archivo
    public function download(File $file){
        return Storage::disk('public')->download($file['name']);
    }
}
