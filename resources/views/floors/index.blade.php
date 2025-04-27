@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1 class="text text-center text-primary display-4">Floor list</h2>

    <a href="{{ route('floors.create') }}" class="btn btn-primary">Create Floor</a>

    @if (session('success'))
    <div style="color: green">
        {{session('success')  }}
    </div>
    @endif

    <table class="table mt-3">
    <tr>
        <th>Id</th>
        <th>Hall Name</th>
        <th>Floor Name</th>
        <th>Description</th>
        <th>Capacity</th>
        <th>Task</th>
        <th>Created By</th>
        <th>Action</th>

    </tr>

    @foreach ($floors as $floor )

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $floor->hall->name }}</td>
        <td>{{ $floor->name }}</td>
        <td>{{ $floor->description }}</td>
        <td>{{ $floor->capacity }}</td>
        <td>{{ $floor->task }}</td>
        <td>{{ $floor->creator->name }}</td>
        <td>
            

            <form action="{{ route('floors.destroy',$floor) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('floors.edit',$floor) }}" class="btn btn-success">Edit</a>
                <button type="submit"  class="btn btn-danger" onclick="return confirm('Are You Sure to Delete?')">Delete</button>
            </form>
        </td>

    </tr>
    
    @endforeach


    </table>

</div>

@endsection