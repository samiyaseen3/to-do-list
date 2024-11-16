<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        $showDataFromDb = Todo::all();
        return view('posts.index' , ['todos' => $showDataFromDb]);
    }
    public function create(){
        $todos = Todo::all();
        return view('posts.create' , ['todos' => $todos]);
    }
    public function store()
{
    //1- get the user data
    $data = request()->all();
    $name = request()->name;
    $description = request()->description;
    $duedate = request()->duedate;
    // dd($data, $name, $description, $duedate);
    //2- store the submitted data in database
    Todo::create([
     'name' => $name,
     'work' => $description,
     'duedate' => $duedate,
    ]);
    
    return to_route('posts.index');

}
public function edit(Todo $todo){
    return view('posts.edit' , ['todo' => $todo]);
}
public function update($todoId){
    $data = request()->all();
    $name = request()->name;
    $description = request()->description;
    $duedate = request()->duedate;
    

    $singleTodoFromDB = Todo::find($todoId);
    $singleTodoFromDB->update([
        'name' => $name,
        'work' => $description,
        'duedate' => $duedate,
    ]);
    return to_route('posts.index' , $todoId);
}

public function destroy(Todo $todo){
  $todo->delete();
  return to_route('posts.index');
}
}
