<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function show()
    {
        $brands = Brand::all();

        return var_dump($brands);
    }
}
