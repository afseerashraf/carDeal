@extends('layout.layout')
@section('title') update @endsection
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
    <h3> Update Car Brand</h3>
    <form action="{{ route('update.brand') }}" method="post">
    @csrf
    <input type="hidden" value="{{encrypt($brand->id)}}" name="id">
    <label for="brand">Brand</label><br>
    <input type="text" name="brandName" placeholder="brand name" value="{{$brand->name}}"><br><br>
    @error('brandName') <div class="alert alert-danger">{{ $message }}</div> @enderror
    <input type="submit" class="form-cotroller btn btn-outline-success">
    </form>
</div>
@endsection