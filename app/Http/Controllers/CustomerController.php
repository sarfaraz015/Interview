<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    public function checkEmail(Request $req)
    {
            $customer = DB::table('customers')
                        ->where('email','=',$req->email)
                        ->get();     
           return sizeof($customer);    
    }

    public function checkPhoneNumber(Request $req)
    {
            $customer = DB::table('customers')
                        ->where('phone','=',$req->phone)
                        ->get();     
            return sizeof($customer);    
    }



    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => array(
                'required',
                'regex:/^([a-z]+)\.([a-z]+\d+)@gmail\.(com)$/'
            ),
            'phone' => 'required|min:10',
            'name' => 'required',
            'address'=>'required',
            'pincode'=>'required'
        ]);

        $customer = DB::table('customers')
                        ->where('email','=',$request->email)
                        ->orWhere('phone','=',$request->phone)
                        ->get();
        
        if(sizeof($customer))
        {
            return back()->with('success','Customer  already exist');
        }
    
        $result = Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);

        CustomerAddresses::create([
            'customer_id'=>$result->id,
            'address'=>$request->address,
            'pincode'=>$request->pincode        
        ]);

        return back()->with('success','Customer added successfully');
    }
}
