<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class CustomerController extends Controller
{
    public function create(){
        return view('customer.create');
    }
    public function store(CustomerRequest $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->route('show.customers');
    }
    public function show(){
        $customers = Customer::withTrashed()->get();
        return view('customer.list', compact('customers'));
    }
    public function edit($id){
        $customerID = Crypt::decrypt($id);
        $customer = Customer::find($customerID);
        return view('customer.update', compact('customer'));
    }
    public function update(CustomerRequest $request){
        $customerID = Crypt::decrypt($request->id);
        $customer = Customer::find($customerID);
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->route('show.customers');
    }
    public function destroy(string $id){
        $customerID = Crypt::decrypt($id);
        $customer = Customer::find($customerID);
        $customer->delete();
        return redirect()->route('show.customers');
    }
    public function restore($id){
        $customerID = Crypt::decrypt($id);
        $customer = Customer::onlyTrashed()->find($customerID);
        $customer->restore();
        return redirect()->route('show.customers');

    }
    public function forcedelete($id){
        $customerID = Crypt::decrypt($id);
        $customer = Customer::withTrashed()->find($customerID);
        $customer->forceDelete();
        return redirect()->route('show.customers');

    }
}
