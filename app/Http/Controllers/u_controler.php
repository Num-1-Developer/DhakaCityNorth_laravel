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

    function show()
    {
        
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



    function ajax($id)
    {
       $data_join = DB::table('words')
                    ->join('police_stations','words.ps_id','=','police_stations.id')
                    ->select('words.id','words.w_number','police_stations.PS_name')
                    ->where('words.ps_id','=',$id)
                    ->orderBy('words.id','desc')
                    ->get();
                    // dd($data_p);

        return response()->json($data_join);

    }



    function insert(request $request)
    {

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
        

    }




    public function update_page($id){
        
        $data_p = parlament_seat::all();
        $data_u = u_model::where ('id',$id)->first();
        return view('update_unit_info',compact('data_p','data_u'));
    }


    




    function update(request $request,$id)
    {
        
         
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
            return redirect('/update_page_unit/'.$id)->with('message', '0');
        }
        else{
            $insert = u_model::find($id);
            $insert->p_id = $request->p_id;
            $insert->ps_id= $request->ps_id;
            $insert->w_id= $request->w_id;
            $insert->union_name= $request->union_name;
            $insert->save();
            return redirect('/add_unit_info')->with('message', '5');
        }
        
    }

   
}
