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
    public function create(){
        return view('car.create');
    }
    public function store(CarRequest $request){
        // $car = new Car();
        // $car->name = $request->carName;
        // $car->brand_id = $request->brand_id;
        // $car->save();
        $input = [
            'name' => $request->carName,
            'brand_id' => $request->brand_id,
        ];
        if($request->hasFile($request->carimage)){
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
        $car->name = $request->carName;
        $car->brand_id = $request->brand_id;
        $car->save();
        return redirect()->route('show.cars');
    }
    public function destroy(string $id){
        $carID = Crypt::decrypt($id);
        $car = Car::find($carID);
        $car->delete();

        return redirect()->route('show.cars')->with('message', 'succesfully deleted');
    }
}
