@extends('layouts.app')
@section('title') Index @endsection

@section('content')
<section class="container">
    <div class="mt-5 d-flex justify-content-between align-items-center">
        <h1>All Todos</h1>
        <a href="{{route('posts.create')}}" class="btn btn-primary">Add Todo</a>
    </div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">Task Name</th>
                <th scope="col">Description</th>
                <th scope="col">Due date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr>
                <td>{{$todo->name}}</td>
                <td>{{$todo->work}}</td>
                <td>{{$todo->duedate}}</td>
                <td>
                    <a href="{{route('posts.edit', $todo->id)}}" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger delete-btn" data-id="{{ $todo->id }}">Delete</button>
                    <form id="delete-form-{{ $todo->id }}" action="{{ route('posts.destroy', $todo->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const todoId = this.dataset.id;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${todoId}`).submit();
                    }
                });
            });
        });
    });
</script>
@endsection
