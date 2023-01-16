<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Landloard;
use App\Models\Seller;
use App\Models\Tenent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function Home()
    {
        if (Auth::check()) {
            return Redirect::route('admin.dashboard');
        } else {
            return view('admin.login');
        }
    }
    public function Login()
    {
        if (Auth::check()) {
            return Redirect::route('admin.dashboard');
        }
        return view('admin.login');
    }
    public function Authenticate(Request $request)
    {
        $this->Validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $request->session()->regenerate();
            try {
                if (Auth::user()) {
                    return redirect()->route('admin.dashboard');
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }else{
            return redirect()->back()->with('error', 'In correct user email and password!');
        }
    }
    public function Show(Request $request)
    {
        $apartment  = $request['apartment'];
        $budget     = $request['budget'];
        $type       = $request['type'];

        if ($request['type'] == 'Seller') {
            if ($budget  == "10k-15k") {
                $search = Seller::where('apartment', $request['apartment'])->whereBetween('budget', [10, 15])->get();
            } elseif ($budget  == "15k-20k") {
                $search = Seller::where('apartment', $request['apartment'])->whereBetween('budget', [15, 20])->get();
            } elseif ($budget  == "20k-30k") {
                $search = Seller::where('apartment', $request['apartment'])->whereBetween('budget', [20, 30])->get();
            } elseif ($budget  == "30k-50k") {
                $search = Seller::where('apartment', $request['apartment'])->whereBetween('budget', [30, 50])->get();
            } else {
                $search = Seller::where('apartment', $request['apartment'])->whereBetween('budget', [50, 80])->get();
            }
        } else {
            if ($budget == "10k-15k") {
                $search = Landloard::where('apartment', $request['apartment'])->whereBetween('budget', [10, 15])->get();
            } elseif ($budget  == "15k-20k") {
                $search = Landloard::where('apartment', $request['apartment'])->whereBetween('budget', [15, 20])->get();
            } elseif ($budget  == "20k-30k") {
                $search = Landloard::where('apartment', $request['apartment'])->whereBetween('budget', [20, 30])->get();
            } elseif ($budget  == "30k-50k") {
                $search = Landloard::where('apartment', $request['apartment'])->whereBetween('budget', [30, 50])->get();
            } else {
                $search = Landloard::where('apartment', $request['apartment'])->whereBetween('budget', [50, 80])->get();
            }
        }
        return view('admin.dashbord', compact('search'));
    }

    public function Notification(Request $request)
    {
        $buyers = [];
        $tenents = [];
        if ($request['buyer']) {
            $buyer = Buyer::where('status', '0')->where('notification', 0)->get();
            foreach ($buyer as $value) {
                $schedule = strtok($value['schedule'], ' ');
                if ($schedule == Carbon::now()->format('m/d/Y')) {
                    $buyers[] = $value;
                } else {
                    continue;
                }
            }
            return view('admin.notification', compact('buyers', 'tenents'));
        } elseif ($request['tenant']) {
            $tenent = Tenent::where('status', 0)->where('notification', 0)->get();
            foreach ($tenent as $value) {
                $schedule = strtok($value['schedule'], ' ');
                if ($schedule == Carbon::now()->format('m/d/Y')) {
                    $tenents[] = $value;
                } else {
                    continue;
                }
            }

            return view('admin.notification', compact('buyers', 'tenents'));
        } else {
            $tenent = Tenent::where('status', 0)->where('notification', 0)->get();
            foreach ($tenent as $value) {
                $schedule = strtok($value['schedule'], ' ');
                if ($schedule == Carbon::now()->format('m/d/Y')) {
                    $tenents[] = $value;
                } else {
                    continue;
                }
            }
            $buyer = Buyer::where('status', '0')->where('notification', 0)->get();
            foreach ($buyer as $value) {
                $schedule = strtok($value['schedule'], ' ');
                if ($schedule == Carbon::now()->format('m/d/Y')) {
                    $buyers[] = $value;
                } else {
                    continue;
                }
            }
            return view('admin.notification', compact('buyers', 'tenents'));
        }
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }


}
