@extends('layouts.app')
@section('title')
    Add Todos
@endsection
@section('content')
<form class="container mt-5" action="{{route('posts.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Task Name</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" name="description" required>
    </div>
    <div class="mb-3">
    <label for="" class="form-label mt-4">Due Date</label>
                <input type="date" name="duedate" class = "form-control" id="duedate" required>
            </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
