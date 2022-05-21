<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;
use App\Models\mpDetail;
use Symfony\Contracts\Service\Attribute\Required;

class mp_controler extends Controller
{


    function show()
    {
        
        $data_p = parlament_seat::all();
       $data_mp = DB::table('mp_details')
                    ->join('parlament_seat','mp_details.p_id','=','parlament_seat.id')
                    ->select('mp_details.*','parlament_seat.name','parlament_seat.no')
                    ->orderBy('mp_details.id','desc')
                    ->get();
        return view('mp_info',compact('data_p','data_mp'));

    }



    function insert(request $request)
    {

        $a = $request->p_id;
        // $b = $request->ps_id;
        $c = $request->mp_nid;
        $d = $request->mp_phone;
        $combine = $c.$d;
        $ps = mpDetail::all();
        $search='';
        foreach($ps as $data){
           
            $com = $data->p_id;

            if($a==$com){
                $search=$com;

            }
        }
        if($search==$a){
            return redirect('/show_mp_info')->with('message', '0');
        }
        else{
            $search='';
            foreach($ps as $data){
                
              
                
                if($data->mp_nid==$c ||$data->mp_phone ==$d ){
                    $search=1;
                  
                }

            }
            if($search==1){
                return redirect('/show_mp_info')->with('message', '0');
            }
            else{
                $insert = new mpDetail;
                $insert->p_id = $request->p_id;
                
                $insert->mp_name= $request->mp_name;
                $insert->mp_email= $request->mp_email;
                $insert->mp_phone= $request->mp_phone;
                $insert->mp_nid= $request->mp_nid;
                $insert->mp_dob= $request->mp_dob;

                if($request->hasFile('mp_img')){
                    $img = $request->File('mp_img');
                    $img_name =time().'.'.$img->getClientOriginalExtension();
                    $img->move('storage/image',$img_name);

                    $insert['mp_img']=$img_name;
                  }
                $insert->save();
                return redirect('/show_mp_info')->with('message', '1');
            }
            
        }

    }



    public function update_page($id){
        
        $data_p = parlament_seat::all();
        $data_mp = mpDetail::where ('id',$id)->first();
        return view('updat_mp_info',compact('data_p','data_mp'));
    }



    function update(request $request,$id)
    {

        $a = $request->p_id;
        
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
            return redirect('/update_page_mp/'.$id)->with('message', '0');
        }
        else{
            foreach($ps as $data){
                $search='';
              
                $com = "0";
                if($data->mp_nid==$c ||$data->mp_phone ==$d ){
                    $search=$com;
                  
                }
            }

            if($search=='0'){
                return redirect('/update_page_mp/'.$id)->with('message', '0');
            }
            else{

                $request->validate([

                    "p_id"=>'required',
                    "mp_name"=>'required',

                    "mp_phone"=>'required',

                    "mp_nid"=>'required',
                    "mp_img"=>'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                $update = mpDetail::find($id);

                $update->p_id = $request->p_id;
                $update->mp_name= $request->mp_name;
                $update->mp_email= $request->mp_email;
                $update->mp_phone= $request->mp_phone;
                $update->mp_nid= $request->mp_nid;

                $update->mp_dob= $request->mp_dob;
                unlink("storage/image/$update->mp_img");


                if($request->hasFile('mp_img')){
                    
                    $img = $request->File('mp_img');
                    $img_name =time().'.'.$img->getClientOriginalExtension();
                    $img->move('storage/image',$img_name);

                    $update['mp_img']=$img_name;
                   
                  }

                $update->save();
                return redirect('/show_mp_info')->with('message', '5');
            }
            
        }

    }



}
