<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;
use App\Models\police_stations;
use App\Models\words;
use App\Models\u_model;
use App\Models\designation;
use App\Models\mpDetail;
use App\Models\policeStationResponsibleParson;
use App\Models\word_rp;
use App\Models\unitRP;

class unit_rp_controler extends Controller
{
    function show()
    {
        
        $data_p = parlament_seat::all();
        $data_designation = designation::all();

       $data_join = DB::table('unit_r_p_s')
                    ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
                    ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
                    ->join('words','unit_r_p_s.w_id','=','words.id')
                    ->join('units','unit_r_p_s.u_id','=','units.id')
                    ->join('designation','unit_r_p_s.d_id','=','designation.id')
                    ->select('unit_r_p_s.*','police_stations.PS_name','parlament_seat.name','parlament_seat.no','designation.d_name','words.w_number','units.union_name')
                    ->orderBy('unit_r_p_s.id','desc')
                    ->get();
        return view('ps_unit_info',compact('data_p','data_join','data_designation'));

    }



     function ajax($id)
     {
                $data_join = DB::table('units')
                     ->join('words','units.w_id','=','words.id')
                     ->select('units.id','units.union_name','words.w_number')
                     ->where('units.w_id','=',$id)
                     ->orderBy('units.id','desc')
                     ->get();
                     // dd($data_p);
 
         return response()->json($data_join);
 
     }

   
   
   
     function insert(request $request)
     {
        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->d_id;
        $d = $request->w_id;
        $e = $request->u_id;
        $f = $request->rp_nid;
        $g = $request->rp_phone;
        $combine = $a.$b.$c.$d.$e;
        $ps = unitRP::all();
        $search='';
        if($ps){

       
        foreach($ps as $data){
            $search='';
            $com = $data->p_id.$data->ps_id.$data->d_id.$data->w_id.$data->u_id;
            // dump($com);
            //     dump($combine);
            if($combine==$com){
                
                $search=$com;

            }else{
               
                
            }
        }
    }
        if($search==$combine){
            return redirect('/show_unit_rp_info')->with('message', '0');
        }
        else{
            foreach($ps as $data){
                $search='';
                // $com = $data->mp_nid.$data->mp_phone;
                $com = "0";
                if($data->rp_nid==$f ||$data->rp_phone ==$g){
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
                return redirect('/show_unit_rp_info')->with('message', '0');
            }
            else{
                $insert = new unitRP;

                $insert->p_id = $request->p_id;
                $insert->ps_id = $request->ps_id;
                $insert->w_id = $request->w_id;
                $insert->u_id = $request->u_id;
                $insert->d_id = $request->d_id;
                $insert->rp_name= $request->rp_name;
                $insert->rp_phone= $request->rp_phone;
                $insert->rp_nid= $request->rp_nid;
                $insert->save();

                return redirect('/show_unit_rp_info')->with('message', '1');
            }
            
        }
    

 
        // if(!empty($request->p_id) && !empty($request->ps_id) && !empty($request->d_id) && !empty($request->rp_name) && !empty($request->rp_phone) && !empty($request->rp_nid) && !empty($request->w_id)&& !empty($request->u_id))
        // {
        //     $p_ids = unitRP::where('p_id', '=', $request->input('p_id'))->first();
        //     $ps_ids = unitRP::where('ps_id', '=', $request->input('ps_id'))->first();
        //     $w_ids = unitRP::where('w_id', '=', $request->input('w_id'))->first();
        //     $u_ids = unitRP::where('u_id', '=', $request->input('u_id'))->first();
        //     $d_ids = unitRP::where('d_id', '=', $request->input('d_id'))->first();
        //     $rp_names = unitRP::where('rp_name', '=', $request->input('rp_name'))->first();
        //     $rp_phones = unitRP::where('rp_phone', '=', $request->input('rp_phone'))->first();
        //     $rp_nids = unitRP::where('rp_nid', '=', $request->input('rp_nid'))->first();



        //     if($p_ids ===null && $rp_phones===null && $rp_nids===null){

        //         $insert = new unitRP;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->u_id = $request->u_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_unit_rp_info')->with('message', '1');
        //     }

        //     elseif ( $w_ids===null && $rp_phones===null&& $rp_nids===null) { 
                    
        //         $insert = new unitRP;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->u_id = $request->u_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_unit_rp_info')->with('message', '1');
              
        //     }
        //     elseif ( $u_ids===null && $rp_phones===null&& $rp_nids===null) { 
                    
        //         $insert = new unitRP;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->u_id = $request->u_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_unit_rp_info')->with('message', '1');
              
        //     }
        //     elseif ( $p_ids===null&&$ps_ids==null && $rp_phones===null&& $rp_nids===null) { 
                   
        //         $insert = new unitRP;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->u_id = $request->u_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_unit_rp_info')->with('message', '1');
    
              
        //     }
         
        //     elseif ($p_ids ===null&& $ps_ids===null&& $d_ids===null && $rp_phones===null&& $rp_nids===null) { 
                   
        //         $insert = new unitRP;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->u_id = $request->u_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_unit_rp_info')->with('message', '1');
              
        //     }
        //     elseif ( $ps_ids===null && $rp_phones===null&& $rp_nids===null) { 
                   
        //         $insert = new unitRP;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->u_id = $request->u_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_unit_rp_info')->with('message', '1');
    
              
        //     }
        //     elseif ( $d_ids===null && $rp_phones===null&& $rp_nids===null) { 
                    
        //         $insert = new unitRP;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->u_id = $request->u_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_unit_rp_info')->with('message', '1');
    
              
        //     }
        //     elseif ( $rp_names===null && $rp_phones===null&& $rp_nids===null) { 
                  
        //         $insert = new unitRP;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->u_id = $request->u_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_unit_rp_info')->with('message', '1');
              
        //     }
        //     elseif($p_ids ===null&& $ps_ids===null&& $d_ids===null&&$rp_names&& $rp_phones===null&& $rp_nids===null){
                   
        //         $insert = new unitRP;

        //         $insert->p_id = $request->p_id;
        //         $insert->ps_id = $request->ps_id;
        //         $insert->w_id = $request->w_id;
        //         $insert->u_id = $request->u_id;
        //         $insert->d_id = $request->d_id;
        //         $insert->rp_name= $request->rp_name;
        //         $insert->rp_phone= $request->rp_phone;
        //         $insert->rp_nid= $request->rp_nid;
        //         $insert->save();

        //         return redirect('/show_unit_rp_info')->with('message', '1');
        //     }
        //     else{
        //         echo "these value is exist";
        //         return redirect('/show_unit_rp_info')->with('message', '0');
        //     }


        // }else{
        // //    echo "empty all value";
        //     return redirect('/show_unit_rp_info')->with('message', '2');
        // }

        
       
    }


    function deletes($model,$id)
    {

        if($model=="parlament_seat")
        {
            $delete_row=parlament_seat::find($id);
            $delete_row->delete();
            return redirect('/add_parlament_info')->with('message', '4');
        }
        elseif($model=="police_stations"){
            $delete_row=police_stations::find($id);
            $delete_row->delete();
            return redirect('/Add_Police_Station')->with('message', '4');
        }
        elseif($model=="words"){
            $delete_row=words::find($id);
            $delete_row->delete();
            return redirect('/add_word_info')->with('message', '4');
        }
        elseif($model=="u_model"){
            $delete_row=u_model::find($id);
            $delete_row->delete();
            return redirect('/add_unit_info')->with('message', '4');
        }
        elseif($model=="designation"){
            $delete_row=designation::find($id);
            $delete_row->delete();
            return redirect('/show_designation_info')->with('message', '4');
        }
        elseif($model=="mpDetail"){
            $delete_row=mpDetail::find($id);
            $delete_row->delete();
            return redirect('/show_designation_info')->with('message', '4');
        }
        elseif($model=="policeStationResponsibleParson"){
            $delete_row=policeStationResponsibleParson::find($id);
            $delete_row->delete();
            return redirect('/show_thana_rs_info')->with('message', '4');
        }
        elseif($model=="word_rp"){
            $delete_row=word_rp::find($id);
            $delete_row->delete();
            return redirect('/show_word_rp_info')->with('message', '4');
        }
        elseif($model=="unitRP"){
            $delete_row=unitRP::find($id);
            $delete_row->delete();
            return redirect('/show_unit_rp_info')->with('message', '4');
        }
        
    }

}
