@extends('layout.layout')
@section('title') Update Customer @endsection
<style>
    .continer{
        margin-top: 150px;
        margin-left: 200px;
        font-style: oblique;
        
    }
    input{
        width: 400px;
    }
    </style>
@section('content')
<div class="continer">
    
<div class="continer">
    <h3>customers</h3>
    <form action="{{ route('update.customer') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="{{ encrypt($customer->id) }}" name="id">
    <label for="brand">Customer Name</label><br>
    <input type="text" name="name" placeholder="customer name" value="{{ $customer->name }}"><br>
    @error('name') <div class="alert alert-danger">{{ $message }}</div>@enderror 
    <label for="Mobile">Mobile</label><br>
    <input type="text" name="mobile" placeholder="Mobile" value="{{ $customer->mobile }}"><br>
    @error('mobile') <div class="alert alert-danger">{{ $message }}</div> @enderror 
    <label for="email">Email</label><br>
    <input type="email" name="email" placeholder="email" value="{{ $customer->email }}"><br><br>
    @error('email') <div class="alert alert-danger">{{ $message}}</div> @enderror
    <input type="file" name="image"><br><br>

    <input type="submit" class="form-cotroller btn btn-outline-success">
    </form>
</div>

</div>
@endsection