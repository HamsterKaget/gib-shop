<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index() {
        Mail::to("radjaauliaalramdani@gmail.com")->send(New )
    }
}
