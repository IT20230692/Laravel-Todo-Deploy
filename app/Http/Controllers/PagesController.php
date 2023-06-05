<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function indexdashboard(){
        $data = Task::all();
        // dd($data);
        return view('dashboard')->with('tasks', $data);
    }
}
