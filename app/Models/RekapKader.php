<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapKader extends Model
{
    use HasFactory;

    protected $table = 'rekap_kader';
    protected $fillable = ['user_id', 'kegiatan', 'tanggal', 'keterangan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
