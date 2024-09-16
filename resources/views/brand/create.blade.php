@extends('layout.layout')
@section('title') Create Brand @endsection
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
    <h3>Car Brand</h3>
    <form action="{{ route('create.brand') }}" method="post">
    @csrf
    <label for="brand">Brand</label><br>
    <input type="text" name="brandName" placeholder="brand name">
    @error('brandName') <div class="alert alert-danger">{{ $message }}</div>@enderror<br>
    <input type="submit" class="form-cotroller btn btn-outline-success">
    </form>
</div>

</div>
@endsection