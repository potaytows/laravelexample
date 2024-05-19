<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class MainController extends Controller
{
    public function index()
    {   
        $todo = Todo::All();
        return view('example')->with("todos",$todo);
    }
    public function addExampleData(Request $request)
    {
        $exampledata1 = new Todo;
        $exampledata1->todoName = $request->todo;
        $exampledata1->Name = $request->name;
        $exampledata1->save();

        return redirect('/home');
    }
    public function deleteData($id)
    {
        Todo::destroy($id);
        return redirect('/home');
    }
}
