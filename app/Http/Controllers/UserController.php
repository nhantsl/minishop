<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index(Request $request)
    {
        $request->user();

        if (Auth::user()->is_admin) {
            return redirect()->route('admin.index');
        }

        $orders =  request()->user()->orders()->latest()->get();

        return view('dashboard', compact('orders'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // không cho xoá admin
        if ($user->is_admin) {
            return back()->withErrors(['delete' => 'Cannot delete admin']);
        }

        // check có orders
        if ($user->orders()->exists()) {
            return back()->withErrors(['delete' => 'User has orders, cannot delete']);
        }

        $user->delete();

        return back()->with('success', 'User deleted!');
    }

}
