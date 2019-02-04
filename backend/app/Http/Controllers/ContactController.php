<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Resources\Contact as ContactResource;
use Validator;

class ContactController extends Controller
{
    public function index(Request $request)
	{
		 //Get all contacts
         $contacts = Contact::get(['id','name','address']);
 
         // Return a collection of $contacts with pagination
         return response()->json($contacts);
    }
     public function show($id)
    {
        # code...
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function store(Request $request)
    {
        # code...
        // $validator = Validator::make($request->all(),[
        //     'text' => 'required'
        // ]);

        // if($validator->fails()){
        //     $response = array('response' => $validator->messages(),'success' => false);
        //     return $response;
        // }else {
            $accept = request()->header('Content-Type'); // application/json

            if( $accept === 'application/json' ){
            $contact = new Contact;
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->address = $request->input('address');

            $contact->save();

            return response()->json($contact);
            }

        // }
    }
  
}
