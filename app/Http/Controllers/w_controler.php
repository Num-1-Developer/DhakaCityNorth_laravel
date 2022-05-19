<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\words;
use App\Models\police_stations;
use App\Models\parlament_seat;

class w_controler extends Controller
{
    function show(){
        
        $data_p = parlament_seat::all();
       $data_join = DB::table('words')
                    ->join('parlament_seat','words.P_id','=','parlament_seat.id')
                    ->join('police_stations','words.ps_id','=','police_stations.id')
                    ->select('words.*','police_stations.PS_name','parlament_seat.name','parlament_seat.no')
                    ->orderBy('words.id','desc')
                    ->get();
                    // dd($data_p);

        return view('add_word_info',compact('data_p','data_join'));

    }
    function ajax($id){
       $data_join = DB::table('police_stations')
                    ->join('parlament_seat','police_stations.P_id','=','parlament_seat.id')
                    ->select('police_stations.id','police_stations.PS_name','parlament_seat.name','parlament_seat.no')
                    ->where('police_stations.P_id','=',$id)
                    ->orderBy('police_stations.id','desc')
                    ->get();
                    // dd($data_p);

        return response()->json($data_join);

    }
    function insert(request $request){

        $ps = words::where('ps_id', '=', $request->input('ps_id'))->first();

        // $insert = new words;
        // $insert->p_id = $request->p_id;
        // $insert->ps_id= $request->ps_id;
        // $insert->w_number= $request->w_number;
        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->w_number;
        $combine = $a.$b.$c;
        $ps = words::all();
        foreach($ps as $data){
            $search='';
            $com = $data->p_id.$data->ps_id.$data->w_number;
            if($combine==$com){
                $search=$com;

            }else{
               
                
            }
        }
        if($search==$combine){
            return redirect('/add_word_info')->with('message', '0');
        }
        else{
            $insert = new words;
            $insert->p_id = $request->p_id;
            $insert->ps_id= $request->ps_id;
            $insert->w_number= $request->w_number;
            $insert->save();
            return redirect('/add_word_info')->with('message', '1');
        }
 
        // dump($combine);
        // dump($ps);
        //  foreach

        // if ($ps ===null) { 
            
        //     $w_number = words::where('w_number', '=', $request->input('w_number'))->first();
        //     if($w_number===null){
        //         $insert = new words;
        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id= $request->ps_id;
        //         $insert->w_number= $request->w_number;
        //         $insert->save();
        //         return redirect('/add_word_info')->with('message', '1');
        //     }else{
        //         $insert = new words;
        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id= $request->ps_id;
        //         $insert->w_number= $request->w_number;
        //         $insert->save();
        //         return redirect('/add_word_info')->with('message', '1');
        //     }
           
        // }
        
        // else{
        //     $w_number = words::where('w_number', '=', $request->input('w_number'))->first();
        //  if($w_number===null){
        //     $insert = new words;
        //     $insert->p_id = $request->p_id;
        //     $insert->ps_id= $request->ps_id;
        //     $insert->w_number= $request->w_number;
        //     $insert->save();
        //     return redirect('/add_word_info')->with('message', '1');
        //  }else{
        //     return redirect('/add_word_info')->with('message', '0');
        //  }
        
        // }

        
       
    }
}
