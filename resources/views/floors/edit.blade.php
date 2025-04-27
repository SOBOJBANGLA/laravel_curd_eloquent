@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <a href="{{ route('floors.index') }}" class="btn btn-primary">Back</a>

    <form action="{{ route('floors.update',$floor->id) }}" method="post" >
    @csrf
    @method('PUT')
    <div>
        Hall Name: <select name="hall_id" class="form-control">
            <option value="">Select One</option>
            @foreach ($halls as $hall)
            <option value="{{ $hall->id }}"{{ $floor->hall_id==$hall->id ? 'selected':" " }}>{{ $hall->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        Name: <input type="text" name="name" class="form-control" value="{{ $floor->name }}">
    </div>

    <div>
        Description: <input type="text" name="description" class="form-control" value="{{ $floor->description }}">
    </div>

    <div>
        Task: <select name="task" class="form-control">
            <option value="">Select One</option>
            <option value="pending" {{ $floor->task == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ $floor->task == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div>
        Capacity: <input type="text" name="capacity" class="form-control" value="{{ $floor->capacity }}">
    </div>
    
    <div>
        <button type="submit" class="btn btn-success">Update Floor</button>
    </div>
    </form>


</div>

@endsection