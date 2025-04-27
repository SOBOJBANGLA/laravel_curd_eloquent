@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <a href="{{ route('floors.index') }}" class="btn btn-primary">Back</a>

    <form action="{{ route('floors.store') }}" method="post">
    @csrf
    <div>
        Hall Name: <select name="hall_id" class="form-control">
            <option value="">Select One</option>
            @foreach ($halls as $hall)
            <option value="{{ $hall->id }}">{{ $hall->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        Name: <input type="text" name="name" class="form-control">
    </div>

    <div>
        Description: <input type="text" name="description" class="form-control">
    </div>

    <div>
        Task: <select name="task" class="form-control">
            <option value="">Select One</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
    </div>

    <div>
        Capacity: <input type="text" name="capacity" class="form-control">
    </div>
    
    <div>
        <button type="submit" class="btn btn-success">Create Floor</button>
    </div>
    </form>


</div>

@endsection