<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function index()
     {

      return view('image');
     }

     public function save(Request $request)
     {
        $image = new Image;

        if($request->hasFile('image_path')){
          $imagePath = $request->file('image_path');
          $imageName = time() . '.' . $imagePath->getClientOriginalExtension();

          $imagePath->move('uploads', $imageName);
          $image->image_path = '/uploads/'.$imageName;
        };

        $image->save();
        return response()->json(['success'=>'Image successfully uploaded']);
      }
}
