<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class BootcampController extends Controller
{

    public function index() {
        // get all data from Program::class with the relation ["Option.Value"] where caretegory_id = 1
        $main = Program::with(['Option.Value', 'Image'])->where('category_id', 1)->get();
        $mini = Program::with(['Option.Value', 'Image'])->where('category_id', 2)->get();
        $free = Program::with(['Option.Value', 'Image'])->where('category_id', 3)->get();
        return view('user.modules.bootcamp.index', compact('main', 'mini', 'free'));
    }

    public function home() {
        // get all data from Program::class with the relation ["Option.Value"] where caretegory_id = 1
        // $programs = Program::with(['Option.Value', 'Image'])->get();
        $main = Program::with(['Option.Value', 'Image'])->where('category_id', 1)->get();
        $mini = Program::with(['Option.Value', 'Image'])->where('category_id', 2)->get();
        $free = Program::with(['Option.Value', 'Image'])->where('category_id', 3)->get();

        return view('user.modules.home.index', compact('main', 'mini', 'free'));
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
