<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class BootcampController extends Controller
{
    public function index() {
        // get all data from Program::class with the relation ["Option.Value"] where caretegory_id = 1
        $programs = Program::with(['Option.Value', 'Image'])->get();
        return view('user.modules.bootcamp.index', compact('programs'));
    }

    public function home() {
        // get all data from Program::class with the relation ["Option.Value"] where caretegory_id = 1
        $programs = Program::with(['Option.Value', 'Image'])->get();
        return view('user.modules.home.index', compact('programs'));
    }

    public function all() {
        // get all data from Program::class with the relation ["Option.Value"] where caretegory_id = 1
        $programs = Program::where('category_id', 1)
        ->with(['Option.Value', 'Image'])->get();

        dd($programs[0]->image);
    }

    public function show($id)
    {
        // Get program by id with the relation ["Option.Value"] and "Image"
        $program = Program::with(['Option.Value', 'Image'])->findOrFail($id);
        // dd($program);
        return view('user.modules.bootcamp.detail', compact('program'));
    }
}
