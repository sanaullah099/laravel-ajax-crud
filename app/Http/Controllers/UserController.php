<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function show()
	{
		return view('arsalan.user');
	}
	
    public function index()
    {
    	$data= User::all();
    	return response()->json(['error'= false, 'message'=> 'Record fetched successfully', 'data'=> $data],200);
    }

    public function store()
    {
    	//
    }

    public function update()
    {
    	//
    }

    public function destroy()
    {
    	//
    }
}
