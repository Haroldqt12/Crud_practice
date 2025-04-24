@extends('layout.app')
@section('title', 'Dashboard')
@section('content')


<div class="container">
    <h1>Edit People</h1>
    <p>Welcome to the dashboard!</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{route('people.update', ['id' => $people->id] )}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $people->name}}" placeholder="Enter your name">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="age"></label>
                <input type="number" id="age" name="age" class="form-control" value="{{ $people->age}}" placeholder="Enter your age">
            </div> 
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <button class="btn btn-sm btn-success">Add</button>
            </div>
        </div>
    </form>
</div>

@endsection