<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function List(){
        $buyers = Buyer::where('status','0')->get();
        return view('admin.buyer.buyer',compact('buyers'));
    }

    public function BuyerForm($id=null){
        if($id){
            try{
                $buyerdata = Buyer::where('id',$id)->first();
                return view('admin.buyer.buyer-form',compact('buyerdata'));
            }catch(\Exception $e){
                return redirect()->back()->with('error',$e->getMessage());
            }
        }else{
            return view('admin.buyer.buyer-form');
        }
    }

    public function InsertBuyer(Request $request,$id=null)
    {
        $array = $request->all();
        if($id){
            try{
                $array['date'] = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
                Buyer::where('id',$id)->update([
                    'name'=>$array['name'],
                    'email'=>$array['email'],
                    'phone'=>$array['phone'],
                    'date'=>$array['date'],
                    'apartment'=>$array['apartment'],
                    'budget'=>$array['budget'],
                    'schedule'=>$array['schedule'],
                    'notification'=>0
                ]);
                return redirect()->route('admin.buyer')->with('success', 'Data Update Successfully');
            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        }else{
            try {
                $array['date'] = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
                Buyer::create($array);
                return redirect()->route('admin.buyer')->with('success', 'Data Store Successfully');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }
    public function BuyerProfile($id=null){
        try{
            $buyerprofile = Buyer::where('id',$id)->first();
            return view('admin.buyer.buyer-profile',compact('buyerprofile'));
        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function DeleteBuyer($id){
        try{
            Buyer::where('id',$id)->delete();
            return redirect()->route('admin.buyer')->with('success', 'Buyer Delete Successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function BuyerDeleteNotification($id=null){
        Buyer::where('id',$id)->update(['notification'=>1]);
        return back();
    }
    public function Booked(Request $request){
        if($request->ajax()){
            try{
                Buyer::where('id',$request['id'])->update(['status'=>$request['status']]);
                return response()->json(['success'=>true], 200);
            }catch(\Exception $e){
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }
}
