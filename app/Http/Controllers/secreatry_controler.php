<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\words;
use App\Models\police_stations;
use App\Models\parlament_seat;
use App\Models\policeStationResponsibleParson;
use App\Models\designation;

class secreatry_controler extends Controller
{
   
    function show(){
        
        $data_p = parlament_seat::all();
        $data_designation = designation::all();

       $data_join = DB::table('police_station_responsible_parsons')
                    ->join('parlament_seat','police_station_responsible_parsons.p_id','=','parlament_seat.id')
                    ->join('police_stations','police_station_responsible_parsons.ps_id','=','police_stations.id')
                    ->join('designation','police_station_responsible_parsons.d_id','=','designation.id')
                    ->select('police_station_responsible_parsons.*','police_stations.PS_name','parlament_seat.name','parlament_seat.no','designation.d_name')
                    ->orderBy('police_station_responsible_parsons.id','desc')
                    ->get();
                    // dd($data_p);
        return view('thana_rs_info',compact('data_p','data_join','data_designation'));

    }

    function insert(request $request){
       
        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->d_id;
        $d = $request->rp_nid;
        $e = $request->rp_phone;
        $combine = $a.$b.$c;
        $ps = policeStationResponsibleParson::all();
        foreach($ps as $data){
            $search='';
            $com = $data->p_id.$data->ps_id.$data->d_id;
            // dump($com);
            //     dump($combine);
            if($combine==$com){
                
                $search=$com;

            }else{
               
                
            }
        }
        if($search==$combine){
            return redirect('/show_thana_rs_info')->with('message', '0');
        }
        else{
            foreach($ps as $data){
                $search='';
                // $com = $data->mp_nid.$data->mp_phone;
                $com = "0";
                if($data->rp_nid==$d ||$data->rp_phone ==$e ){
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
                return redirect('/show_thana_rs_info')->with('message', '0');
            }
            else{
                $insert = new policeStationResponsibleParson;
                $insert->p_id = $request->p_id;
                $insert->ps_id = $request->ps_id;
                $insert->d_id = $request->d_id;
                $insert->rp_name= $request->rp_name;
                $insert->rp_phone= $request->rp_phone;
                $insert->rp_nid= $request->rp_nid;
                $insert->save();
                return redirect('/show_thana_rs_info')->with('message', '1');
            }
            
        }
    

        // if(!empty($request->p_id) && !empty($request->ps_id) && !empty($request->d_id) && !empty($request->rp_name) && !empty($request->rp_phone) && !empty($request->rp_nid))
        // {
        //     $p_ids = policeStationResponsibleParson::where('p_id', '=', $request->input('p_id'))->first();
        //     $ps_ids = policeStationResponsibleParson::where('ps_id', '=', $request->input('ps_id'))->first();
        //     $d_ids = policeStationResponsibleParson::where('d_id', '=', $request->input('d_id'))->first();
        //     $rp_names = policeStationResponsibleParson::where('rp_name', '=', $request->input('rp_name'))->first();
        //     $rp_phones = policeStationResponsibleParson::where('rp_phone', '=', $request->input('rp_phone'))->first();
        //     $rp_nids = policeStationResponsibleParson::where('rp_nid', '=', $request->input('rp_nid'))->first();



        //     if($p_ids ===null && $rp_phones===null && $rp_nids===null){
        //         $insert = new policeStationResponsibleParson;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_thana_rs_info')->with('message', '1');
        //     }

        //     elseif ( $p_ids===null&&$ps_ids==null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new policeStationResponsibleParson;
                
        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_thana_rs_info')->with('message', '1');
    
              
        //     }
         
        //     elseif ($p_ids ===null&& $ps_ids===null&& $d_ids===null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new policeStationResponsibleParson;
                
        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_thana_rs_info')->with('message', '1');
              
        //     }
        //     elseif ( $ps_ids===null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new policeStationResponsibleParson;
                
        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_thana_rs_info')->with('message', '1');
    
              
        //     }
        //     elseif ( $d_ids===null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new policeStationResponsibleParson;
                
        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_thana_rs_info')->with('message', '1');
    
              
        //     }
        //     elseif ( $rp_names===null && $rp_phones===null&& $rp_nids===null) { 
        //         $insert = new policeStationResponsibleParson;
                
        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_thana_rs_info')->with('message', '1');
    
              
        //     }
        //     elseif($p_ids ===null&& $ps_ids===null&& $d_ids===null&&$rp_names&& $rp_phones===null&& $rp_nids===null){
        //         $insert = new policeStationResponsibleParson;
                
        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_thana_rs_info')->with('message', '1');
        //     }
        //     else{
        //         return redirect('/show_thana_rs_info')->with('message', '0');
        //     }


        // }else{
        //     return redirect('/show_thana_rs_info')->with('message', '2');
        // }

        
       
    }
}
