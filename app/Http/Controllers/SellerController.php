<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function List()
    {
        $sellers = Seller::all();
        return view('admin.seller.seller', compact('sellers'));
    }

    public function SellerForm($id = null)
    {
        if ($id) {
            try {
                $sellerdata = Seller::where('id', $id)->first();
                return view('admin.seller.seller-form', compact('sellerdata'));
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            return view('admin.seller.seller-form');
        }
    }
    public function InsertSeller(Request $request, $id = null)
    {
        $array = $request->all();
        if ($id) {
            try{
                $array['date'] = Carbon::createFromFormat('d/m/Y',$request['date'])->format('Y-m-d');
                Seller::where('id',$id)->update([
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
            return redirect()->route('admin.seller')->with('success', 'Data Updated Successfully');
            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {

            try {
                $array['date'] = Carbon::createFromFormat('d/m/Y', $request['date'])->format('Y-m-d');
                Seller::create($array);
                return redirect()->route('admin.seller')->with('success', 'Data Store Successfully! Thankyou');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }
    public function SellerProfile($id = null)
    {
        try {
            if ($id) {
                $sellerdata = Seller::where('id', $id)->first();
                return view('admin.seller.seller-profile', compact('sellerdata'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function SellerDelete($id=null){
        try{
            if($id){
                Seller::where('id',$id)->delete();
                return redirect()->route('admin.seller')->with('success', 'Seller Deleted Successfully');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function Booked(Request $request){
        if($request->ajax()){
            try{
                Seller::where('id',$request['id'])->update(['status'=>$request['status']]);
                return response()->json(['success'=>true], 200);
            }catch(\Exception $e){
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }
}
