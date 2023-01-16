<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function List()
    {
        $employees = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'employee');
            }
        )->get();
        return view('admin.employee.employee', compact('employees'));
    }
    public function InsertEmployee(Request $request, $id = null)
    {
        if ($id) {
            $validated = $request->validate([
                'name'   => 'required',
                'email'  => 'required|email'
            ]);
            $array = $request->all();
            try{
            if ($array['password'] == null) {
                User::where('id',$id)->update([
                    'name'  => $array['name'],
                    'email' => $array['email']
                ]);
            }else{
                User::where('id',$id)->update([
                    'name'  => $array['name'],
                    'email' => $array['email'],
                    'password' => Hash::make($array['password'])
                ]);
            }
            return redirect()->route('admin.employee')->with('success', 'Employee Updated Successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        } else {

            $validated = $request->validate([
                'name'      => 'required',
                'email'     => 'required|email',
                'password'  => 'required'
            ]);
            $array = $request->all();
            $array['password'] = Hash::make($request['passowrd']);
            try {
                $employee = User::create($array);
                $employee->assignRole('employee');
                return redirect()->route('admin.employee')->with('success', 'Employee Inserted Successfully');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function Show($id = null)
    {
        $employee = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'employee');
            }
        )->where('id', $id)->first();
        return view('admin.employee.employee-form', compact('employee'));
    }

    public function EmployeeDelete($id=null){
        if($id){
            try{
                if($id==1){
                    return redirect()->back()->with('error', 'You Can not delete Admin');
                }else{
                    User::where('id',$id)->delete();
                    return redirect()->route('admin.employee')->with('success', 'Employee Deleted Successfully');
                }
            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }
}
