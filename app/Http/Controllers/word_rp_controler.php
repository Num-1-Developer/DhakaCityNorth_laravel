<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\words;
use App\Models\police_stations;
use App\Models\parlament_seat;
use App\Models\policeStationResponsibleParson;
use App\Models\designation;
use App\Models\word_rp;

class word_rp_controler extends Controller
{
    function show(){
        
        $data_p = parlament_seat::all();
        $data_designation = designation::all();

       $data_join = DB::table('word_rps')
                    ->join('parlament_seat','word_rps.p_id','=','parlament_seat.id')
                    ->join('police_stations','word_rps.ps_id','=','police_stations.id')
                    ->join('words','word_rps.w_id','=','words.id')
                    ->join('designation','word_rps.d_id','=','designation.id')
                    ->select('word_rps.*','police_stations.PS_name','parlament_seat.name','parlament_seat.no','designation.d_name','words.w_number')
                    ->orderBy('word_rps.id','desc')
                    ->get();
        return view('word_rp_info',compact('data_p','data_join','data_designation'));

    }



    function insert(request $request){

        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->d_id;
        $d = $request->w_id;
        $e = $request->rp_nid;
        $f = $request->rp_phone;
        $combine = $a.$b.$c.$d;
        $ps = word_rp::all();
        foreach($ps as $data){
            $search='';
            $com = $data->p_id.$data->ps_id.$data->d_id.$data->w_id;
            // dump($com);
            //     dump($combine);
            if($combine==$com){
                
                $search=$com;

            }else{
               
                
            }
        }
        if($search==$combine){
            return redirect('/show_word_rp_info')->with('message', '0');
        }
        else{
            foreach($ps as $data){
                $search='';
                // $com = $data->mp_nid.$data->mp_phone;
                $com = "0";
                if($data->rp_nid==$e ||$data->rp_phone ==$f){
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
                return redirect('/show_word_rp_info')->with('message', '0');
            }
            else{
                $insert = new word_rp;
                $insert->p_id = $request->p_id;
                $insert->ps_id = $request->ps_id;
                $insert->w_id = $request->w_id;
                $insert->d_id = $request->d_id;
                $insert->rp_name= $request->rp_name;
                $insert->rp_phone= $request->rp_phone;
                $insert->rp_nid= $request->rp_nid;
                $insert->save();
                return redirect('/show_word_rp_info')->with('message', '1');
            }
            
        }
    

 
        // if(!empty($request->p_id) && !empty($request->ps_id) && !empty($request->d_id) && !empty($request->rp_name) && !empty($request->rp_phone) && !empty($request->rp_nid) && !empty($request->w_id))
        // {
        //     $p_ids = word_rp::where('p_id', '=', $request->input('p_id'))->first();
        //     $ps_ids = word_rp::where('ps_id', '=', $request->input('ps_id'))->first();
        //     $w_ids = word_rp::where('w_id', '=', $request->input('w_id'))->first();
        //     $d_ids = word_rp::where('d_id', '=', $request->input('d_id'))->first();
        //     $rp_names = word_rp::where('rp_name', '=', $request->input('rp_name'))->first();
        //     $rp_phones = word_rp::where('rp_phone', '=', $request->input('rp_phone'))->first();
        //     $rp_nids = word_rp::where('rp_nid', '=', $request->input('rp_nid'))->first();



        //     if($p_ids ===null && $rp_phones===null && $rp_nids===null){
        //         $insert = new word_rp;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_word_rp_info')->with('message', '1');
        //     }

        //     elseif ( $w_ids===null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new word_rp;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_word_rp_info')->with('message', '1');
              
        //     }
        //     elseif ( $p_ids===null&&$ps_ids==null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new word_rp;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_word_rp_info')->with('message', '1');
    
              
        //     }
         
        //     elseif ($p_ids ===null&& $ps_ids===null&& $d_ids===null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new word_rp;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_word_rp_info')->with('message', '1');
              
        //     }
        //     elseif ( $ps_ids===null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new word_rp;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_word_rp_info')->with('message', '1');
    
              
        //     }
        //     elseif ( $d_ids===null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new word_rp;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_word_rp_info')->with('message', '1');
    
              
        //     }
        //     elseif ( $rp_names===null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new word_rp;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_word_rp_info')->with('message', '1');
              
        //     }
        //     elseif($p_ids ===null&& $ps_ids===null&& $d_ids===null&&$rp_names&& $rp_phones===null&& $rp_nids===null){
        //         $insert = new word_rp;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_word_rp_info')->with('message', '1');
        //     }
        //     else{
        //         echo "these value is exist";
        //         return redirect('/show_word_rp_info')->with('message', '0');
        //     }


        // }else{
        // //    echo "empty all value";
        //     return redirect('/show_word_rp_info')->with('message', '2');
        // }

        
       
    }
}
