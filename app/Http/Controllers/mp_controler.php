<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;
use App\Models\mpDetail;

class mp_controler extends Controller
{
    function show(){
        
        $data_p = parlament_seat::all();
       $data_mp = DB::table('mp_details')
                    ->join('parlament_seat','mp_details.p_id','=','parlament_seat.id')
                    ->select('mp_details.*','parlament_seat.name','parlament_seat.no')
                    ->orderBy('mp_details.id','desc')
                    ->get();
        return view('mp_info',compact('data_p','data_mp'));

    }



    function insert(request $request){

        $a = $request->p_id;
        // $b = $request->ps_id;
        $c = $request->mp_nid;
        $d = $request->mp_phone;
        $combine = $c.$d;
        $ps = mpDetail::all();
        foreach($ps as $data){
            $search='';
            $com = $data->p_id;
            if($a==$com){
                $search=$com;

            }else{
               
                
            }
        }
        if($search==$a){
            return redirect('/show_mp_info')->with('message', '0');
        }
        else{
            foreach($ps as $data){
                $search='';
                // $com = $data->mp_nid.$data->mp_phone;
                $com = "0";
                if($data->mp_nid==$c ||$data->mp_phone ==$d ){
                    $search=$com;
                    // return redirect('/show_mp_info')->with('message', '0');
    
                }else{
                   
                    // $insert = new mpDetail;
                    // $insert->p_id = $request->p_id;
                    //     // echo $insert->PS_name;
                    // $insert->mp_name= $request->mp_name;
                    // $insert->mp_phone= $request->mp_phone;
                    // $insert->mp_nid= $request->mp_nid;
                    // $insert->save();
                    // return redirect('/show_mp_info')->with('message', '1');
                }
            }
            if($search=='0'){
                return redirect('/show_mp_info')->with('message', '0');
            }
            else{
                $insert = new mpDetail;
                $insert->p_id = $request->p_id;
                    // echo $insert->PS_name;
                $insert->mp_name= $request->mp_name;
                $insert->mp_phone= $request->mp_phone;
                $insert->mp_nid= $request->mp_nid;
                $insert->save();
                return redirect('/show_mp_info')->with('message', '1');
            }
            
        }

        // $p_id = mpDetail::where('p_id', '=', $request->input('p_id'))->first();

        // if ($p_id ===null) { 
        //     $mp_phone = mpDetail::where('mp_phone', '=', $request->input('mp_phone'))->first();
        //     if($mp_phone===null){
        //         $mp_nid = mpDetail::where('mp_nid', '=', $request->input('mp_nid'))->first();
        //         if($mp_nid===null){
        //             $insert = new mpDetail;
        //             $insert->p_id = $request->p_id;
        //             // echo $insert->PS_name;
        //             $insert->mp_name= $request->mp_name;
        //             $insert->mp_phone= $request->mp_phone;
        //             $insert->mp_nid= $request->mp_nid;
        //             $insert->save();

        //             return redirect('/show_mp_info')->with('message', '1');
        //         }else{
        //             return redirect('/show_mp_info')->with('message', '0');
        //         }
        //     }else{
        //         return redirect('/show_mp_info')->with('message', '0');
        //     }

          
        // }
        // else{
        //     $mp_name = mpDetail::where('mp_name', '=', $request->input('mp_name'))->first();

        //     if($mp_name===null){
        //         $insert = new mpDetail;
        //         $insert->p_id = $request->p_id;
        //         // echo $insert->PS_name;
        //         $insert->mp_name= $request->mp_name;
        //         $insert->mp_phone= $request->mp_phone;
        //         $insert->mp_nid= $request->mp_nid;
        //         $insert->save();

        //         return redirect('/show_mp_info')->with('message', '1');
        //     }else{
        //         return redirect('/show_mp_info')->with('message', '0');
        //     }
         
        
        // }
    }
}
