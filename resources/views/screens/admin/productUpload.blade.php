@extends('layouts.app')

@section('content')
@if ($message=Session::get('success'))

<div class="alert alert-success alert-dismissible">
    <strong>{{$message}}</strong>
</div>
@endif
    <div class="container">
        <form action="{{ route('product.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-control" >Produuct Name</label>
                    <x-test type="text" placeholder="Enter Name" name="name" value="{{old('name')}}"/>
                </div>
                <div class="col-md-4">
                    <label for="" class="form-control">Produuct Code</label>
                    <x-test type="text" placeholder="Enter Code" name="code" value="{{old('code')}}"/>
                </div>
                <div class="col-md-4">
                    <label for="" class="form-control">Produuct Price</label>
                    <x-test type="number" placeholder="Enter price" name="price" value="{{old('price')}}"/>
                </div>
                <div class="col-md-6 ">
                    <button class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>
@endsection
