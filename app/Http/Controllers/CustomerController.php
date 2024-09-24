<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Jobs\CustomerEmail;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Events\CreateCustomerEvent;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customer.create');
    }
    public function store(CustomerRequest $request)
    {
        $input = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
        ];
        if ($request->hasfile('image')) {
            $fileName = time() . "_" . $request->image->getClientOriginalExtension();
            Storage::putFileAs('uploads/images', $request->image, $fileName);
            $input['image'] = $fileName;
        }
        $customer = Customer::create($input);
        CustomerEmail::dispatch($customer);
        CreateCustomerEvent::dispatch($customer);
        return redirect()->route('show.customers');
    }
    public function show()
    {
        $customers = Customer::withTrashed()->get();
        return view('customer.list', compact('customers'));
    }
    public function edit($id)
    {
        $customerID = Crypt::decrypt($id);
        $customer = Customer::find($customerID);
        return view('customer.update', compact('customer'));
    }
    public function update(CustomerRequest $request)
    {
        $customerID = Crypt::decrypt($request->id);
        $customer = Customer::find($customerID);
        $input = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
        ];
        if ($request->hasfile('image')) {
            $fileName = time() . "_" . $request->image->getClientOriginalExtension();
            Storage::putFileAs('uploads/images', $request->image, $fileName);
            $input['image'] = $fileName;
        }
        $customer->update($input);
        $customer->save();
        return redirect()->route('show.customers');
    }
    public function destroy(string $id)
    {
        $customerID = Crypt::decrypt($id);
        $customer = Customer::find($customerID);
        $customer->delete();
        return redirect()->route('show.customers');
    }
    public function restore($id)
    {
        $customerID = Crypt::decrypt($id);
        $customer = Customer::onlyTrashed()->find($customerID);
        $customer->restore();
        return redirect()->route('show.customers');
    }
    public function forcedelete($id)
    {
        $customerID = Crypt::decrypt($id);
        $customer = Customer::withTrashed()->find($customerID);
        $customer->forceDelete();
        return redirect()->route('show.customers');
    }
    public function order($id)
    {
        $customerID = Crypt::decrypt($id);
        $customer = Customer::find($customerID);
        if (!$customer->order) {
            return "<h2>" . $customer->name . " does not have order" . "</h2>";
        }
        return view('customer.order', compact('customer'));
    }
    public function ukserver()
    {
        return view('customer.server');
    }
}
