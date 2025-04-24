@extends('layout.app')
@section('title', 'Dashboard')
@section('content')


<div class="container">
    <h1>Dashboard</h1>
    <p>Welcome to the dashboard!</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{route("people.store")}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="age"></label>
                <input type="number" id="age" name="age" class="form-control" placeholder="Enter your age">
            </div> 
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <button class="btn btn-sm btn-success">Add</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col">
            
            <h2>People List</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->age }}</td>
                            <td><a href="{{ route('people.edit', $person->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{route('people.destroy', $person->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection