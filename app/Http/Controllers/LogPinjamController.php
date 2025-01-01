<?php

namespace App\Http\Controllers;

use App\Models\LogPinjaman;
use Illuminate\Http\Request;

class LogPinjamController extends Controller
{
    public function destroy($id)
{
    // Cari log peminjaman berdasarkan ID
    $logPinjaman = LogPinjaman::find($id);

    if (!$logPinjaman) {
        return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan.');
    }

    // Hapus log peminjaman
    $logPinjaman->delete();

    return redirect()->back()->with('success', 'Data peminjaman berhasil dihapus.');
}

}
