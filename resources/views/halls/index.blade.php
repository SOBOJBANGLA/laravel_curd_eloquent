@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1 class="text text-center text-primary display-4">Hall list</h2>

    <a href="{{ route('halls.create') }}" class="btn btn-primary">Create Hall</a>

    @if (session('success'))
    <div style="color: green">
        {{session('success')  }}
    </div>
    @endif

    <table class="table mt-3">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
        <th>Address</th>
        <th>Contact Info</th>
        <th>Created By</th>
        <th>Action</th>

    </tr>

    @foreach ($halls as $hall )

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $hall->name }}</td>
        <td><img src="{{ asset('storage/'.$hall->image) }}" alt="" style="width:80px "></td>
        <td>{{ $hall->address }}</td>
        <td>{{ $hall->contact_info }}</td>
        <td>{{ $hall->creator->name }}</td>
        <td>
           
            <form action="{{ route('halls.destroy',$hall) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('halls.edit',$hall) }}" class="btn btn-success">Edit</a>
                <button type="submit"  class="btn btn-danger" onclick="return confirm('Are You Sure to Delete?')">Delete</button>
            </form>
        </td>

    </tr>
    
    @endforeach


    </table>

</div>

@endsection