@extends('layout.layout')
@section('title') Create Brand @endsection
<style>
    .continer{
        margin-top: 150px;
        margin-left: 300px;
        font-style: oblique;
        
    }
    .form-continer{
        background-color: #f2ebeb;
        height: 221px;
        width: 456px;
        padding-left: 26px;
        padding-top: 24px;
        border-radius: 3px 3px 3px 3px;
        box-shadow: 2px 2px 3px 3px;
    }
    input{
        width: 400px;
    }
    .row{
        padding-top: 50px;
    }
    img{
        height:103px;
        width: 130px;
        object-fit: cover;
        transition: 0.5 ease-in-out;
        border-radius: 50%;
        box-shadow: 1px 1px 1px 1px;
    }
    img:hover{
    transform: scale(1.1) rotate(-3deg);
}
    </style>
@section('content')
<div class="continer">
    
<div class="form-continer">
    <form action="{{ route('create.brand') }}" method="post">
    @csrf
    <label for="brand">Brand</label><br>
    <input type="text" name="brandName" id="brand-name-input" placeholder="brand name">
    @error('brandName') <div class="alert alert-danger">{{ $message }}</div>@enderror<br><br>
    <input type="submit" class="form-cotroller btn btn-outline-success">
    </form>
</div>

<div class="row">
    <div class="col-3" mb-4>
        <img src="{{ asset('brands/hundai.jpeg') }}" alt="hundai" value="hundai" class="brand-logo">
    </div>
    <div class="col-3" mb-4>
        <img src="{{ asset('brands/suzuki.png') }}" alt="suziki" value="suzuki" class="brand-logo">
    </div>
    <div class="col-3" mb-4>
        <img src="{{ asset('brands/toyota.jpeg') }}" alt="toyota" value="toyota" class="brand-logo">
    </div>
    <div class="row">
    <div class="col-3" mb-4>
        <img src="{{ asset('brands/renault.jpeg') }}" alt="renault" value="renault" class="brand-logo">
    </div>
    <div class="col-3" mb-4>
        <img src="{{ asset('brands/honda.jpeg') }}" alt="honda" value="honda" class="brand-logo">
    </div>
    <div class="col-3" mb-4>
        <img src="{{ asset('brands/benz.jpeg') }}" alt="benz" value="Mercedes-Benz" class="brand-logo">
    </div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
     $(document).ready(function() {
       $('.brand-logo').click(function(){
        var brandName = $(this).attr('value');
        $('#brand-name-input').val(brandName);

       })
    });
</script>
@endsection

