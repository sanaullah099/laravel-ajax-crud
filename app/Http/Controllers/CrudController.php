<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;
use DB;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Crud::all();
        return view('create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email= $request->post('email');
        $password= $request->post('password');
        $save=DB::table('cruds')->insert(array(['email'=>$email, 'password'=>$password]));
        if (!$save) {
            $msg="Data submission failed";
             return $msg;
        }
        else{
            $msg="Data submitted successfully";
             return $msg;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud, $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(crud $crud, $id)
    {
        $edit=Crud::find($id);
        return view('edit', compact('edit'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud $crud, $id)
    {
        $id= $request->id;
        $email= $request->email;
        $password= $request->password;
        $curd=Crud::where('id',$id)->first();
        $curd->email=$email;
        $curd->password=$password;
        $curd->save();
        return redirect()->route('create');
        // $save=DB::table('cruds')->where('id',$id)->update(array(['email'=>$email, 'password'=>$password]));
        // if (!$save) {
        //     $msg="Data submission failed";
        //      return $msg;
        // }
        // else{
        //     return view('create');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud $crud, $id)
    {
        $delete=Crud::find($id)->delete();

        return redirect()->back();
    }
}
