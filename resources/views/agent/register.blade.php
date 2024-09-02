@extends('layout.layout')
@section('title') Agent Registerform @endsection
<style>
    *{
        text-decoration: none;
    }
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
    <h3>Register Form</h3>
    <a href="{{ route('login') }}">already have an account</a>
    <form action="{{ route('agent.register') }}" method="post">
    @csrf
    <label for="name">Name</label><br>
    <input type="text" class="form-controller" name="name" placeholder="Name"><br>
    @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
    <label for="email">email</label><br>
    <input type="email" class="form-controller" name="email" placeholder="email"><br>
    @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
    <label for="password">Password</label><br>
    <input type="password" class="form-controller" name="password" placeholder="password"><br><br>
    @error('password') <div class="alert alert-danger">{{ $message }}</div>@enderror
    <input type="submit" class="btn btn-outline-primary" value="register">
    </form>
</div>

@endsection