<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ManageUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request) {
        $where = [];
        if($request->search) {
            $where += ['name' => $request->search];
        }

        $users = User::where($where)->paginate(10);
        $total = $users->total();


        return view('admin.modules.manage-user.index', compact('users', 'total'));
    }

    // make me function store for creating new user record
    public function store(ManageUserRequest $request)
    {
        $request->validated();
        // dd($request);

        try {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            // you can also return a response or redirect to a page after the user is created
            return response(['status' => 'success'], 200);
        } catch (Exception $e) {
            return response(['status' => 'failed', 'error' => $e], 500);
        }
    }

    public function update(ManageUserRequest $request)
    {
        $request->validated();
        $userId = $request->input('id');
        // dd('adaaa');

        try {
            $user = User::findOrFail($userId);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return response(['status' => 'success'], 200);
        } catch (Exception $e) {
            return response(['status' => 'failed', 'error' => $e], 500);
        }
    }

    public function destroy(Request $request)
    {
        // dd($request);
        $userId = $request->input('id');

        try {
            $user = User::findOrFail($userId);
            $user->delete();
            return response(['status' => 'success'], 200);
        } catch (Exception $e) {
            return response(['status' => 'failed', 'error' => $e], 500);
        }
    }


}
