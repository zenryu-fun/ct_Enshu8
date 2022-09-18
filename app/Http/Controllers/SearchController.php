<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        $tags = Tag::all();
        $users = Auth::user();
        $name = $request->name;
        $tag_id = $request->tag_id;

        //名前タグnull
        if ($name == null and $tag_id == null) {
          $todos = Todo::where('user_id', $users->id)->get();
        
        //名前null            
        } else if ($name == null) {
          $todos = Todo::where('user_id', $users->id)
                        ->where('tag_id',$tag_id)
                        ->get();
        
        //タグnull
        } else if ($tag_id == null) {
          $todos = Todo::where('user_id', $users->id)
                        ->where('name', "like" ,"%".$name."%")
                        ->get();

        //名前タグあり
        } else {
          $todos = Todo::where('user_id', $users->id)
                        ->where('name', "like", "%".$name."%")
                        ->where('tag_id',$tag_id)
                        ->get();
        }
        
        return view('search', ['todos' => $todos,'tags' => $tags, 'users' => $users]);
    }

    public function search_update(TodoRequest $request)
    {
        $form = Todo::find($request->id);
        $form->name = $request->name;
        $form->tag_id = $request->tag_id;
        Todo::where('id', $request->id)->update(['name' => $form->name] );
        Todo::where('id', $request->id)->update(['tag_id' => $form->tag_id]);
        return redirect('/search');
    }    

    public function search_delete(TodoRequest $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/search');
    }

    public function return()
    {
        return redirect('/home');
    }

}