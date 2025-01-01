<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\LogPinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('userViews.userView', compact('items'));
    }

    public function detail(Item $item)
    {
        return view('userViews.userDetail', compact('item'));
    }

    public function pinjam(Request $request, Item $item)
    {
        $user = Auth::user();

        LogPinjaman::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'status' => 'pending',
        ]);

        return redirect('/user-item/status')->with('success', 'Request for borrowing has been sent.');
    }

    public function status()
    {
        $user = Auth::user();

        // Ambil data log pinjaman berdasarkan status
        $pending = $user->logPinjaman()->where('status', 'pending')->get();
        $approved = $user->logPinjaman()->where('status', 'approved')->get();
        $rejected = $user->logPinjaman()->where('status', 'rejected')->get();

        return view('userViews.userStatusPinjam', compact('pending', 'approved', 'rejected'));
    }
}
