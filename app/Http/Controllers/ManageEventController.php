<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageEventRequest;
use App\Models\Program;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ManageEventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request) {
        $where = [];
        $with = ["Category", "Image", "Option"];
        if($request->search) {
            $where += ['name' => $request->search];
        }

        $programs = Program::with($with)
            ->where($where)
            ->orderBy('id', 'desc')
            // ->latest('updated_at')
            ->paginate(5);


        $total = $programs->total();

        // dd($programs);

        return view('admin.modules.manage-event.index', compact('programs', 'total'));
    }

    public function table() {
        $where = [];
        $with = ["Category", "Image", "Option"];

        $query = Program::with($with)
            ->where($where)
            ->orderBy('id', 'desc')
            // ->latest('updated_at')
            ->paginate(5);


        $total = $query->total();

        return response(['status' => 'success', 'data' => $query], 200);
    }

    // make me function store for creating new user record
    public function store(ManageEventRequest $request)
    {
        $request->validated();
        try {
            $validatedData = $request->validated();

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = hash('sha256', time()) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = $thumbnail->storeAs('images/produk', $thumbnailName, 'public');
            $validatedData['thumbnail'] = $thumbnailPath;

            $startDate = date('Y-m-d', strtotime($validatedData['start_date']));
            $endDate = date('Y-m-d', strtotime($validatedData['end_date']));

            $validatedData['start_date'] = $startDate;
            $validatedData['end_date'] = $endDate;

            $data = Program::create($validatedData);

            return response(['status' => 'success', "data" => $data], 200);
        } catch (Exception $e) {
            return response(['status' => 'failed', 'error' => $e], 500);
        }

    }

    public function update(ManageEventRequest $request)
    {

        try {
            $validatedData = $request->validated();

            $startDate = date('Y-m-d', strtotime($validatedData['start_date']));
            $endDate = date('Y-m-d', strtotime($validatedData['end_date']));

            $validatedData['start_date'] = $startDate;
            $validatedData['end_date'] = $endDate;

            $program = Program::findOrFail($validatedData['id']);

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = hash('sha256', time()) . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnailPath = $thumbnail->storeAs('images/produk', $thumbnailName, 'public');
                $validatedData['thumbnail'] = $thumbnailPath;
            }

            $program->update($validatedData);

            return response(['status' => 'success', 'data' => $program], 200);
        } catch (Exception $e) {
            return response(['status' => 'failed', 'error' => $e], 500);
        }
    }


    public function destroy(Request $request)
    {
        // dd($request);
        $userId = $request->input('id');

        try {
            $data = Program::findOrFail($userId);
            $data->delete();
            return response(['status' => 'success'], 200);
        } catch (Exception $e) {
            return response(['status' => 'failed', 'error' => $e], 500);
        }
    }

}
