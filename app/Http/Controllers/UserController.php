<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;


class UserController extends Controller
{

    public function index()
    {

        $tasks = Task::where('user_id', auth()->id())->get();

        return view('userDashboard', ['tasks' => $tasks]);
    }
}
