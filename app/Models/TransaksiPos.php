<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPos extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pos';
    protected $guarded = ['id_transaksi_pos'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
