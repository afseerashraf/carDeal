@extends('layout.layout')
@section('title') Create customers @endsection
<style>
    .continer {
        margin-top: 150px;
        margin-left: 200px;
        font-style: oblique;

    }

    input {
        width: 400px;
        border-top: none;
        border-left: none;
        border-right: none;
    }
</style>
@section('content')
<div class="continer">

    <div class="continer">
        @section('page')Customer @endsection
        <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="customer name"><br>
            @error('name') <p class="alert alert-danger">{{ $message }}</p>@enderror <br>
            <input type="text" name="mobile" placeholder="Mobile"><br>
            @error('mobile') <p class="alert alert-danger">{{ $message }}</p> @enderror
            <br>
            <input type="email" name="email" placeholder="email"><br><br>
            @error('email') <p class="alert alert-danger">{{ $message}}</p> @enderror
            <input type="file" name="image"><br><br>
            <input type="submit" class="form-cotroller btn btn-outline-success">
        </form>
    </div>

</div>
@endsection