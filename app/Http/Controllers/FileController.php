<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    public function index()
    {

      return view('files');
    }

    public function store(Request $request)
    {
      $file = new File;

      if ($request->file('file')) {
        $filePath = $request->file('file');
        $fileName = $filePath->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
      }

      $file->name = $fileName;
      $file->path = '/storage/'.$path;
      $file->save();

      return response()->json([ 'success' => $fileName ]);
    }

    public function remvoeFile(Request $request)
    {
        $name =  $request->get('name');
        File::where(['name' => $name])->delete();

        $path = storage_path().'/uploads/'.$name;

        if (file_exists($path)) {
            unlink($path);
        }

        return $filename;
    }

}
