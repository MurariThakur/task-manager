<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $totalTasks = Task::where('user_id', $user_id)->count();
        $completedTasks = Task::where('user_id', $user_id)->where('status', 'completed')->count();
        $pendingTasks = Task::where('user_id', $user_id)->where('status', 'pending')->count();
        $overdueTasks = Task::where('user_id', $user_id)->where('status', 'pending')->where('due_date', '<', now())->count();
        $tasksDueSoon = Task::where('user_id', $user_id)->where('due_date', '<', now()->addHours(24))->get();
        $tasksDueSoon = Task::where('user_id', $user_id)->where('status', 'pending')->where('due_date', '>', now()) ->where('due_date', '<', now()->addHours(24)) ->get();
        return view('dashboard', compact('totalTasks', 'completedTasks', 'pendingTasks', 'overdueTasks','tasksDueSoon'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
    }
    public function editpassword()
    {
        return view('profile.change-password');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Password changed successfully.');
    }
}
