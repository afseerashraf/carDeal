@extends('layout.layout')
@section('title') Create customers @endsection
<style>
    .continer{
        margin-top: 150px;
        margin-left: 200px;
        font-style: oblique;
        
    }
    input{
        width: 100px;
    }
    .btn{
        width:630px;
    }
    </style>
@section('content')
<div class="continer">
    
<div class="continer">
    <h3>Car Order</h3>
    <form action="{{ route('store.order') }}" method="post">
    @csrf
    <label for="brand">Car</label>
    <input type="number" name="car_id" placeholder="car">
    <label for="Mobile">Agent</label>
    <input type="number" name="agent_id" placeholder="agent">
    <label for="Mobile">Customer</label>
    <input type="number" name="customer_id" placeholder="customer">
    <label for="Mobile">Amount</label>
    <input type="text" name="amount" placeholder="amount"><br><br>
    <input type="submit" class="form-cotroller btn btn-outline-success">
    </form>
</div>

</div>
@endsection