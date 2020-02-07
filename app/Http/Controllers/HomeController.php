<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batches;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


    }
}
