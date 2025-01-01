<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPinjaman extends Model
{
    use HasFactory;

    protected $table = 'log_pinjaman'; // Nama tabel

    protected $fillable = [
        'user_id',
        'item_id',
        'start_date',
        'end_date',
        'status',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Item
    public function item()
{
    return $this->belongsTo(Item::class);
}
}


