<?php

namespace App\Http\Controllers;

use App\Utils\Utils;
use App\Models\Task;
use App\Models\Tasklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        return view('home', ['user' => $user]);
    }


}
