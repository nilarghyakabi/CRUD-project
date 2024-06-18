<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\customer;
use Illuminate\Http\Request;

class customerController extends Controller
{

    public function index()
    {
        $customers = customer::active()->paginate(10);
        dd($customers);
    }

    public function form(Request $request)
    {
        return view('customer.form');
    }
    public function save(CustomerRequest $request)
    {
        try {
            customer::create(
                [
                    'name' => $request->name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'user_id' => $request->user_id,
                    'status' => $request->status,
                ]
            );
        } catch (throwable $th) {
            throw $th;
        }

        //dd($request->all());
        return redirect()->route('customer-view');
    }
    public function view()
    {
        $customers = customer::all();
        return view('customer.view',compact('customers'));
    }

    public function delete($id)
    {
        $customer=customer::find($id);
        $customer->delete();
        return redirect()->route('customer-list');
    }
    public function edit($id){
        $customer=customer::find($id);
        return view('customer.edit')->with('customer',$customer);
    }
    public function update(Request $request,$id){
        $customer= Customer::find($id);
        $data=[
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'user_id' => $request->user_id,
            'status' => $request->status,
        ];
        $customer->update($data);
        return redirect()->route('customer-view');
    }


}
