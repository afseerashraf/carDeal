<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Crypt;

use Illuminate\View\View;
use Illuminate\View\Middleware\ShareErrorsFromSession;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    /**
     * Show the form for creating a new resource.
     */
    public function create(BrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->brandName;
        return redirect()->route('show.brand');
        
        
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $brandes = Brand::all();
        return view('brand.list', compact('brandes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brandID = Crypt::decrypt($id);
        $brand = Brand::find($brandID);
        return view('brand.update', compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request)
    {
        $brandID = Crypt::decrypt($request->id);
        $brand = Brand::find($brandID);
        $brand->name = $request->brandName;
        $brand->save();
        return redirect()->route('show.brand');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brandID = Crypt::decrypt($id);
        $brand = Brand::find($brandID);
        $brand->delete();
        return redirect()->route('show.brand');
    }
    public function restore($id){
        $brandID = Crypt::decrypt($id);
        $brand = Brand::onlyTrashed()->find($brandID);
        $brand->restore();
        return redirect()->route('show.brand');
       
    }
   
 
}
