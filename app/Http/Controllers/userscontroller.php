<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\users;

class userscontroller extends Controller
{
   public function index(){
       $users = users::all();

       return response()->json($users);
   }
   public function store(Request $request){
     users::create($request->all());
}
    
}
