<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewUserDashboardcontroller extends Controller
{
    public function index() {
        return view('backend.sections.user.home.index');
    }
}
