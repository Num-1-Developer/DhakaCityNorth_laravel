<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\words;
use App\Models\police_stations;
use App\Models\parlament_seat;
use App\Models\u_model;

class u_controler extends Controller
{
    function show(){
        
        $data_p = parlament_seat::all();
       $data_join = DB::table('units')
                    ->join('parlament_seat','units.p_id','=','parlament_seat.id')
                    ->join('police_stations','units.ps_id','=','police_stations.id')
                    ->join('words','units.w_id','=','words.id')
                    ->select('units.*','words.w_number','police_stations.PS_name','parlament_seat.name','parlament_seat.no')
                    ->orderBy('units.id','desc')
                    ->get();
                    // dd($data_p);

        return view('add_unit_info',compact('data_p','data_join'));

    }
    function ajax($id){
       $data_join = DB::table('words')
                    ->join('police_stations','words.ps_id','=','police_stations.id')
                    ->select('words.id','words.w_number','police_stations.PS_name')
                    ->where('words.ps_id','=',$id)
                    ->orderBy('words.id','desc')
                    ->get();
                    // dd($data_p);

        return response()->json($data_join);

    }
    function insert(request $request){

        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->w_id;
        $d = $request->union_name;
        $combine = $a.$b.$c.$d;
        $ps = u_model::all();
        foreach($ps as $data){
            $search='';
            $com = $data->p_id.$data->ps_id.$data->w_id.$data->union_name;
            if($combine==$com){
                $search=$com;

            }else{
               
                
            }
        }
        if($search==$combine){
            return redirect('/add_unit_info')->with('message', '0');
        }
        else{
            $insert = new u_model;
            $insert->p_id = $request->p_id;
            $insert->ps_id= $request->ps_id;
            $insert->w_id= $request->w_id;
            $insert->union_name= $request->union_name;
            $insert->save();
            return redirect('/add_unit_info')->with('message', '1');
        }
        

//         if(!empty($request->p_id) && !empty($request->ps_id) && !empty($request->d_id) && !empty($request->rp_name) && !empty($request->rp_phone) && !empty($request->rp_nid) && !empty($request->w_id))
//         {
//             $union_name = u_model::where('p_id', '=', $request->input('p_id'))->first();
//             $ps_ids = u_model::where('ps_id', '=', $request->input('ps_id'))->first();
//             $w_ids = u_model::where('w_id', '=', $request->input('w_id'))->first();



//             if($ps_ids ===null){
//          $insert = new u_model;

//           $insert = new u_model;
//         // $insert->p_id = $request->p_id;
//         // $insert->ps_id= $request->ps_id;
//         // $insert->w_id= $request->w_id;
//         // $insert->union_name= $request->union_name;
//         // $insert->save();
//         // return redirect('/add_unit_info')->with('message', '1');
//             }

//             elseif ( $w_ids===null) { 
//                 $insert = new u_model;
//                 $insert->p_id = $request->p_id;
//                 $insert->ps_id= $request->ps_id;
//                 $insert->w_id= $request->w_id;
//                 $insert->union_name= $request->union_name;
//                 $insert->save();
//                 return redirect('/add_unit_info')->with('message', '1');
              
//             }
//             elseif ( $union_name===null) { 
//                 $insert = new u_model;
//         $insert->p_id = $request->p_id;
//         $insert->ps_id= $request->ps_id;
//         $insert->w_id= $request->w_id;
//         $insert->union_name= $request->union_name;
//         $insert->save();
//         return redirect('/add_unit_info')->with('message', '1');
    
              
//             }
         
          
//             else{
//                 echo "these value is exist";
//                 return redirect('/show_word_rp_info')->with('message', '0');
//             }


//         }else{
//         //    echo "empty all value";
//             return redirect('/show_word_rp_info')->with('message', '2');
//         }










//         $user = u_model::where('union_name', '=', $request->input('union_name'))->first();

//  if ($user ===null) { 
    
//         $insert = new u_model;
//         $insert->p_id = $request->p_id;
//         $insert->ps_id= $request->ps_id;
//         $insert->w_id= $request->w_id;
//         $insert->union_name= $request->union_name;
//         $insert->save();
//         return redirect('/add_unit_info')->with('message', '1');
//         }else{
//           $msg= 'This value is exist';
//           return redirect('/add_unit_info')->with('message', '0');
        
//         }


    }
}
