<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Storage;
class CarController extends Controller
{
    public function store(CarRequest $request){
        $input = [
            'name' => $request->carName,
            'brand_id' => $request->brand_id,
        ];
        if($request->hasFile('carimage')){
            $fileName = time()."_".$request->carimage->getClientOriginalExtension();
            Storage::putFileAs('uploads/images',$request->carimage,$fileName);
            $input['image'] = $fileName;
        }
        $car = Car::create($input);
        return redirect()->route('show.cars');
    }
    public function show(){
        $cars = Car::all();
        return view('car.list', compact('cars'));
    }
    public function edit(string $id){
        $carID = Crypt::decrypt($id);
        $car = Car::find($carID);
        return view('car.update', compact('car'));
    }
    public function update(CarRequest $request){
        $carID = Crypt::decrypt($request->id);
        $car = Car::find($carID);
        $input = [
            'name' => $request->carName,
            'brand_id' => $request->brand_id,
        ];
        if($request->hasFile('carimage')){
            $fileName = time().'_'.$request->carimage->getClientOriginalExtension();
            Storage::putFileAs('uploads/images',$request->carimage, $fileName);
            $input['image'] = $fileName;
        }
        $car->update($input);
        $car->save();
        return redirect()->route('show.cars');
    }
    public function destroy(string $id){
        $carID = Crypt::decrypt($id);
        $car = Car::find($carID);
        $car->delete();
        return redirect()->route('show.cars')->with('message', 'succesfully deleted');
    }
    public function restore($id){
        $carID = Crypt::decrypt($id);
        $car = Car::onlyTrashed()->find($carID)->restore();
        return redirect()->route('show.cars');
    }
    
    public function forceDelete($id){
        $carID = Crypt::decrypt($id);
        $car = Car::withTrashed()->find($carID)->forceDelete();
        return redirect()->route('show.cars');

    }
}
