<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BootcampController extends Controller
{

    public function index() {
        // get all data from Program::class with the relation ["Option.Value"] where caretegory_id = 1
        // $main = Program::with(['Option.Value', 'Image'])->where('category_id', 1)->get();
        // $mini = Program::with(['Option.Value', 'Image'])->where('category_id', 2)->get();
        // $free = Program::with(['Option.Value', 'Image'])->where('category_id', 3)->get();

        $main = Program::with(['Option.Value', 'Image'])
            ->where('category_id', 1)
            ->where('status', 'public')
            ->orderByDesc('featured')
            ->orderBy('start_date')
            ->get();

        $mini = Program::with(['Option.Value', 'Image'])
            ->where('category_id', 2)
            ->where('status', 'public')
            ->orderByDesc('featured')
            ->orderBy('start_date')
            ->get();

        $free = Program::with(['Option.Value', 'Image'])
            ->where('category_id', 3)
            ->where('status', 'public')
            ->orderByDesc('featured')
            ->orderBy('start_date')
            ->get();

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

    // public function show($id)
    // {
    //     // Get program by id with the relation ["Option.Value"] and "Image"
    //     $program = Program::with(['Option.Value', 'Image'])->findOrFail($id);
    //     // dd($program);
    //     return view('user.modules.bootcamp.detail', compact('program'));
    // }

    // *** Function Slug

    public function showBySlug($slug)
    {
        // Get program by slug with the relation ["Option.Value"] and "Image"
        $program = Program::with(['Option.Value', 'Image'])->where('slug', $slug)->firstOrFail();

        return view('user.modules.bootcamp.detail', compact('program'));
    }


    public function updateSlugs()
    {
        $programs = Program::all();

        foreach ($programs as $program) {
            $slug = Str::slug($program->title);
            $program->update(['slug' => $slug]);
        }

        return "Slugs updated successfully!";
    }


}
