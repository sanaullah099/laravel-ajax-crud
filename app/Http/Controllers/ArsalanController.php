<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsalanController extends Controller
{
    public function index()
    {
    return view('arsalan.index');
  }

  // Fetch records
  public function getUsers(){
    // Call getuserData() method of Page Model
    $userData['data'] = Page::getuserData();

    echo json_encode($userData);
    exit;
  }

  // Insert record
  public function addUser(Request $request){

    $name = $request->input('name');
    $phone = $request->input('phone');
    $city = $request->input('city');
    $email = $request->input('email');
    $image = $request->input('image');

    if($name !='' && $phone !='' && $city != '' && $email != '' && $image != ''){
      $data = array('name'=>$name,"phone"=>$phone,"city"=>$city,"email"=>$email,"image"=>$image);

      // Call insertData() method of Page Model
      $value = Page::insertData($data);
      if($value){
        echo $value;
      }else{
        echo 0;
      }

    }else{
       echo 'Fill all fields.';
    }

    exit; 
  }

  // Update record
  public function updateUser(Request $request){

    $name = $request->input('name');
    $phone = $request->input('phone');
    $city = $request->input('city');
    $email = $request->input('email');
    $image = $request->input('image');

    if($name !='' && $phone !='' && $city != '' && $email != '' && $image != ''){
      $data = array('name'=>$name,"phone"=>$phone,"city"=>$city,"email"=>$email,"image"=>$image);

      // Call updateData() method of Page Model
      Page::updateData($editid, $data);
      echo 'Update successfully.';
    }else{
      echo 'Fill all fields.';
    }

    exit; 
  }

  // Delete record
  public function deleteUser($id=0){
    // Call deleteData() method of Page Model
    Page::deleteData($id);

    echo "Delete successfully";
    exit;
  }
}
