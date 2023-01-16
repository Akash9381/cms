<?php

namespace App\Http\Controllers;

use App\Models\Tenent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TenentController extends Controller
{
    public function List(){
        $tenents = Tenent::where('status',0)->get();
        return view('admin.tenent.tenent',compact('tenents'));
    }
    public function TenentProfile($id=null){
        try{
            $tenentprofile = Tenent::where('id',$id)->first();
            return view('admin.tenent.tenent-profile',compact('tenentprofile'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function TenentForm($id=null){
        if($id){
            try{
                $tenentprofile = Tenent::where('id',$id)->first();
                return view('admin.tenent.tenent-form',compact('tenentprofile'));
            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        }else{
            return view('admin.tenent.tenent-form');
        }
    }
    public function InsertTenent(Request $request,$id=null)
    {
        $array =  $request->all();
        if($id){
            try{
                $array['date'] = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
                Tenent::where('id',$id)->update([
                    'name'=>$array['name'],
                    'email'=>$array['email'],
                    'phone'=>$array['phone'],
                    'date'=>$array['date'],
                    'apartment'=>$array['apartment'],
                    'budget'=>$array['budget'],
                    'schedule'=>$array['schedule'],
                    'notification'=>0
                ]);
                return redirect()->route('admin.tenent')->with('success', 'Data Update Successfully');
            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        }else{
            try {
                $array['date'] = Carbon::createFromFormat('d/m/Y', $request['date'])->format('Y-m-d');
                Tenent::create($array);
                return redirect()->route('admin.tenent')->with('success', 'Data Store Successfully! Thankyou');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function TenentDelete($id=null){
        try{
            Tenent::where('id',$id)->delete();
            return redirect()->route('admin.tenent')->with('success', 'Tenent Deleted Successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function TenentDeleteNotification($id=null){
        Tenent::where('id',$id)->update(['notification'=>1]);
        return back();
    }
    public function Booked(Request $request){
        if($request->ajax()){
            try{
                Tenent::where('id',$request['id'])->update(['status'=>$request['status']]);
                return response()->json(['success'=>true], 200);
            }catch(\Exception $e){
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }
}
