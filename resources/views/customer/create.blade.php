@extends('layout.layout')
@section('title') Create customers @endsection
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
    <form action="{{ route('customer.store') }}" method="post">
    @csrf
    <label for="brand">Customer Name</label><br>
    <input type="text" name="name" placeholder="customer name"><br>
    @error('name') <div class="alert alert-danger">{{ $message }}</div>@enderror 
    <label for="Mobile">Mobile</label><br>
    <input type="text" name="mobile" placeholder="Mobile"><br>
    @error('mobile') <div class="alert alert-danger">{{ $message }}</div> @enderror 
    <label for="email">Email</label><br>
    <input type="email" name="email" placeholder="email"><br><br>
    @error('email') <div class="alert alert-danger">{{ $message}}</div> @enderror
    <input type="submit" class="form-cotroller btn btn-outline-success">
    </form>
</div>

</div>
@endsection