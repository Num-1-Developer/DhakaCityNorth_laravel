<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;
use App\Models\police_stations;

class PS_controler extends Controller
{
    function show(){
        
        $data_p = parlament_seat::all();
       $data_ps = DB::table('police_stations')
                    ->join('parlament_seat','police_stations.P_id','=','parlament_seat.id')
                    ->select('police_stations.*','parlament_seat.name','parlament_seat.no')
                    ->orderBy('police_stations.id','desc')
                    ->get();
        return view('Add_Police_Station',compact('data_p','data_ps'));

    }

    
    function insert(request $request){

        $user = police_stations::where('PS_name', '=', $request->input('PS_name'))->first();

        if ($user ===null) { 
            $insert = new police_stations;
            $insert->PS_name = $request->PS_name;
            // echo $insert->PS_name;
            $insert->P_id= $request->P_id;
            $insert->save();
            return redirect('/Add_Police_Station')->with('message', '1');
        }else{
          return redirect('/Add_Police_Station')->with('message', '0');
        
        }
    }
    
    
    public function update_page($id){
        
        $data_p = parlament_seat::all();
        $data_ps = police_stations::where ('id',$id)->first();
        return view('update_page_ps',compact('data_p','data_ps'));
    }

    public function update(request $request,$id){
        $update = police_stations::where('id',$id)->first();

        $update->PS_name = $request->PS_name;
        $update->P_id= $request->P_id;
        $update->save();
        return redirect('/Add_Police_Station')->with('message', '1');
        
    }
}
