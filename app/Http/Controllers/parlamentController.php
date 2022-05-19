<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;

class parlamentController extends Controller
{

function validation(){
    return view('add_parlament_info');
}

function insert(request $request){
  $user = parlament_seat::where('no', '=', $request->input('no'))->first();
if ($user ===null) {
    $insert = new parlament_seat;
    $insert->name= $request->name ;
    $insert->no= $request->no;
    $insert->save();
    // echo "<script> alert('done'); </script>";
    return redirect('/add_parlament_info')->with('message', '1');
}else{
  $msg= 'This value is exist';
    return redirect('/add_parlament_info')->with('message', '0');

}
       
       
    }
    function show(){
      
         $data_fetch = parlament_seat::orderBY('id','desc')->get();
         return view('add_parlament_info',['data'=>$data_fetch,"data_noti"=>'yes']);
    }
   
    public function update_page($id){
        $data_fetch = parlament_seat::orderBY('id','desc')->get();
        $data = parlament_seat::where ('id',$id)->first();
        return view('parlament_update_page',compact('data_fetch','data'));
    }

    public function update(request $request,$id){
        $update = parlament_seat::where('id',$id)->first();
 
        $update->name= $request->name ;
        $update->no= $request->no;
        $update->save();
        return redirect('/add_parlament_info');
        
    }
    public function delete($id){
        $data = parlament_seat::where('id',$id)->first();
        $data->delete();
        return redirect('/add_parlament_info');
        // return view('add_category');
    }
}
