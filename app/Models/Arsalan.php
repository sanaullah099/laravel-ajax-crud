<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsalan extends Model
{
    use HasFactory;

   public static function getuserData($id=null){

     $value=DB::table('arsalans')->orderBy('id', 'asc')->get(); 
     return $value;

   }

   public static function insertData($data){

     $value=DB::table('arsalans')->where('name', $data['name'])->where('phone', $data['phone'])->where('city', $data['city'])->where('email', $data['email'])->where('image', $data['image'])->get();
     if($value->count() == 0){
       $insertid = DB::table('arsalans')->insertGetId($data);
       return $insertid;
     }else{
       return 0;
     }

   }

   public static function updateData($id,$data){
      DB::table('arsalans')->where('id', $id)->update($data);
   }

   public static function deleteData($id=0){
      DB::table('arsalans')->where('id', '=', $id)->delete();
   }

}
