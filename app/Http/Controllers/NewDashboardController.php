<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewDashboardController extends Controller
{
    public function index() {
        return view('backend.sections.home.index');
    }
}
