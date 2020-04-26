<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Contact;

class ContactController extends Controller
{
    public function contact(Request $request) {

      $request->validate([
          'name'    => 'required',
          'email'   => 'required',
          'subject' => 'required',
          'message' => 'required'
      ]);

      $contact = new Contact;
      $contact->name    = $request->name;
      $contact->email   = $request->email;
      $contact->subject = $request->subject;
      $contact->message = $request->message;

      $contact->save();

      return response()->json([
          "message" => "Contact successfully"
      ], 201);

      // $returnHTML = view('job.userjobs')->with('userjobs', $userjobs)->render();
    }
}
