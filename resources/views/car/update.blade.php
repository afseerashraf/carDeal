@extends('layout.layout')
@section('title') Update Car @endsection
<style>
    .continer{
        margin-top: 150px;
        margin-left: 300px;
        font-style: oblique;
        
    }
    input{
        width: 400px;
    }
    </style>
@section('content')
<div class="continer">
    
<div class="continer">
    <h3>Update Car</h3>
    <form action="{{ route('car.update') }}" method="post">
    @csrf
    <input type="hidden" value="{{ encrypt('$car->id') }}" name="id">
    <label for="brand">Name</label><br>
    <input type="text" name="carName" placeholder="car name" value="{{ $car->name }}">
    @error('carName') <div class="alert alert-danger">{{ $message }}</div>@enderror <br>
    <label for="brand id">Brand id</label><br>
    <input type="text" name="brand_id" placeholder="brand id" value="{{ $car->brand_id }}"><br><br>
    @error('brand_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
    <input type="submit" class="form-cotroller btn btn-outline-success">
    </form>
</div>

</div>
@endsection