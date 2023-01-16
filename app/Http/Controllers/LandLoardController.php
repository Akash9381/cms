<?php

namespace App\Http\Controllers;

use App\Models\Landloard;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class LandLoardController extends Controller
{
    public function List(){
        $landloards = Landloard::all();
        return view('admin.landloard.land-loard',compact('landloards'));
    }
    public function LandLoardForm($id=null){
        if($id){
            try{
                $landloardprofile = Landloard::where('id',$id)->first();
                return view('admin.landloard.landloard-form',compact('landloardprofile'));
            }catch(\Exception $e){
                return redirect()->back()->with('error',$e->getMessage());
            }
        }else{
            return view('admin.landloard.landloard-form');
        }
    }
    public function InsertLandLoard(Request $request,$id=null){
        $array = $request->all();
        if($id){
            $array['date'] = Carbon::createFromFormat('d/m/Y',$request['date'])->format('Y-m-d');
            Landloard::where('id',$id)->update([
                'name'          => $array['name'],
                'email'         => $array['email'],
                'phone'         => $array['phone'],
                'date'          => $array['date'],
                'apartment'     => $array['apartment'],
                'area'          => $array['area'],
                'society'       => $array['society'],
                'block'         => $array['block'],
                'floor'         => $array['floor'],
                'flat_no'       => $array['flat_no'],
                'bathroom'      => $array['bathroom'],
                'balcony'       => $array['balcony'],
                'lift'          => $array['lift'],
                'parking'       => $array['parking'],
                'apartment_type' => $array['apartment_type'],
                'budget'        => $array['budget'],
            ]);
            return redirect()->route('admin.landloard')->with('success', 'Data Updated Successfully');

        }else{
            try{
                $array['date'] = Carbon::createFromFormat('d/m/Y',$request['date'])->format('Y-m-d');
                Landloard::create($array);
                return redirect()->route('admin.landloard')->with('success', 'Data Store Successfully! Thankyou');
            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }
    public function LandLoardProfile($id=null){
        try{
            if($id){
                $landloardprofile = Landloard::where('id',$id)->first();
                return view('admin.landloard.landloard-profile',compact('landloardprofile'));
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function LandLoardDelete($id=null){
        try{
            if($id){
                Landloard::where('id',$id)->delete();
                return redirect()->route('admin.landloard')->with('success', 'Landloard Deleted Successfully');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function Booked(Request $request){
        if($request->ajax()){
            try{
                Landloard::where('id',$request['id'])->update(['status'=>$request['status']]);
                return response()->json(['success'=>true], 200);
            }catch(\Exception $e){
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }
}
