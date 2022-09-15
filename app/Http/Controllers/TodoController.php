<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $todos = Todo::all();
        $users = Auth::user();
        return view('todolist', ['todos' => $todos,'tags' => $tags, 'users' => $users]);
    }   

    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/home');
    }

    public function update(TodoRequest $request)
    {
        $form = Todo::find($request->id);
        $form->name = $request->name;
        $form->tag_id = $request->tag_id;
        Todo::where('id', $request->id)->update(['name' => $form->name] );
        Todo::where('id', $request->id)->update(['tag_id' => $form->tag_id]);
        return redirect('/home');
    }    

    public function delete(TodoRequest $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}