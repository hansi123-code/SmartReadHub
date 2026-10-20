<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->search;


        $users = User::when($search, function($query) use($search){

            $query->where('name','like',"%{$search}%")
                  ->orWhere('email','like',"%{$search}%");

        })
        ->latest()
        ->paginate(10);



        return view('admin.users',compact('users'));

    }




    public function destroy($id)
    {

        $user = User::findOrFail($id);


        $user->delete();


        return redirect()
        ->route('admin.users')
        ->with('success','User Deleted Successfully');

    }

}