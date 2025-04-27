@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <a href="{{ route('halls.index') }}" class="btn btn-primary">Back</a>

    <form action="{{ route('halls.update',$hall->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        Name: <input type="text" name="name" class="form-control" value="{{ $hall->name }}">
    </div>

    <div>
        Image: <input type="file" name="image" class="form-control">
        <img src="{{ asset('storage/'.$hall->image) }}" alt="" style="width:80px ">
    </div>

    <div>
        Address: <input type="text" name="address" class="form-control" value="{{ $hall->address }}" >
    </div>

    <div>
        Contact Info: <input type="text" name="contact_info" class="form-control" value="{{ $hall->contact_info }}">
    </div>
    
    <div>
        <button type="submit" class="btn btn-success">Update Hall</button>
    </div>
    </form>


</div>

@endsection