<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\LevelUser;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class LevelUserController extends Controller
{
    public function enroll($id)
    {
        $users = User::findOrFail($id);
        $programs = Program::all();
        $levels = Level::all();

        return view('pages.admin.levelUsers.create', compact('users', 'programs', 'levels'));
    }

    public function store(Request $request)
    {
        User::find($request->user_id)->levels()->syncWithoutDetaching($request->level_id);
        return redirect()->route('user.all');
    }

    public function delete(Request $request)
    {
        User::find($request->user_id)->levels()->detach($request->level_id);
        return redirect()->back();
    }

    public function manyEnroll()
    {
        $users = User::where('role', '!=', 'admin')->get();
        $levels = Level::all();

        return view('pages.admin.enroll ', compact('users', 'levels'));
    }    

    public function manyEnrollStore(Request $request)
    {
        foreach ($request->levels as $levelId) {
            Level::find($levelId)->users()->syncWithoutDetaching($request->users);
        }
        
        return redirect()->route('user.all');
    }
}
