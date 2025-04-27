@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <a href="{{ route('halls.index') }}" class="btn btn-primary">Back</a>

    <form action="{{ route('halls.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div>
        Name: <input type="text" name="name" class="form-control">
    </div>

    <div>
        Image: <input type="file" name="image" class="form-control">
    </div>

    <div>
        Address: <input type="text" name="address" class="form-control">
    </div>

    <div>
        Contact Info: <input type="text" name="contact_info" class="form-control">
    </div>
    
    <div>
        <button type="submit" class="btn btn-success">Create Hall</button>
    </div>
    </form>


</div>

@endsection