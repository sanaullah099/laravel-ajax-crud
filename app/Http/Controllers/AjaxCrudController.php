<?php

namespace App\Http\Controllers;

use App\Models\AjaxCrud;
use Illuminate\Http\Request;

class AjaxCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('arsalan.ajaxCrud');
    }

    public function response()
    {
        $data = AjaxCrud::all();
        return response()->json(['error'=>false, 'message'=>'successfully', 'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
        ]);

        $save = new AjaxCrud();

        $save->name = $request->name;
        $save->phone = $request->phone;
        $save->city = $request->city;
        $save->email = $request->email;
        $save->save();

        if(!$save){
            $msg ="Bad Attemp";
            return $msg;
        }
        else{
            $msg ="Successfully";
            return $msg;
        }
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AjaxCrud  $ajaxCrud
     * @return \Illuminate\Http\Response
     */
    public function show(AjaxCrud $ajaxCrud, $id)
    {
        $show= AjaxCrud::find($id);
        return response()->json(['error' =>false, 'message'=>'data fetched', 'data'=> $show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AjaxCrud  $ajaxCrud
     * @return \Illuminate\Http\Response
     */
    public function edit(AjaxCrud $ajaxCrud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AjaxCrud  $ajaxCrud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AjaxCrud $ajaxCrud)
    {
        $request->validate([
            'name' => 'required|max:30',
        ]);
        $id= $request->id;
        $name=$request->name;
        $phone=$request->phone;
        $city=$request->city;
        $email=$request->email;
        $crud=AjaxCrud::where('id',$id)->first();
        $crud->name=$name;
        $crud->phone=$phone;
        $crud->city=$city;
        $crud->email=$email;
        $crud->save();
        return response()->json(['error'=>false, 'message'=>'update successfully'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AjaxCrud  $ajaxCrud
     * @return \Illuminate\Http\Response
     */
    public function destroy(AjaxCrud $ajaxCrud, $id)
    {
        $delete = AjaxCrud::find($id);
        $delete->delete();

         return response()->json(['message'=>'successfully'], 200);

    }
}
