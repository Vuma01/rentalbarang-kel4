<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\LogPinjaman;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {

        $userCount = User::count();
        $itemCount = Item::count();
        $categoryCount = Category::count();


        return view('adminViews.adminDashboard', compact('userCount', 'itemCount', 'categoryCount'));
    }

    public function profile()
    {
        return view('userViews.userView');
    }

     // List semua user
     public function listUsers()
     {
         $users = User::doesntHave('logPinjaman')->get();
         return view('adminViews.listUserViews.userList', compact('users'));
     }


     // List user  pinjaman nunggu persetujuan
     public function pendingUsers()
    {
        $users = User::whereHas('logPinjaman', function ($query) {
            $query->where('status', 'pending');
        })->get();
        return view('adminViews.listUserViews.userPending', compact('users'));
    }

    // List user pinjaman aktif
    public function borrowingUsers()
    {
        $users = User::whereHas('logPinjaman', function ($query) {
            $query->where('status', 'approved');
        })->get();
        return view('adminViews.listUserViews.userBorrowing', compact('users'));
    }


     // Approve pinjaman
     public function approveLoan($id) {

    $loan = LogPinjaman::findOrFail($id);


    $item = Item::findOrFail($loan->item_id);


    if ($item->stock <= 0) {
        return redirect()->back()->with('error', 'Stok barang tidak mencukupi untuk disetujui.');
    }


    $item->update(['stock' => $item->stock - 1]);


    $loan->update([
        'status' => 'approved',
        'start_date' => now()->toDateString(),
        'end_date' => now()->addDays(7)->toDateString(),
    ]);

    return redirect()->back()->with('success', 'Peminjaman berhasil disetujui dan stok barang telah diperbarui.');}

     // Reject pinjaman
     public function rejectLoan($id)
     {
         $logPinjaman = LogPinjaman::findOrFail($id);
         $logPinjaman->update(['status' => 'rejected']);
         return redirect()->back()->with('success', 'Berhasil di REJECT');
     }


     public function destroy($id)
     {
         $user = User::findOrFail($id);
         $user->delete();

         return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
     }


}
