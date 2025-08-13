<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiKader extends Model
{
    use HasFactory;

    protected $table = 'prestasi_kader';
    protected $fillable = ['user_id', 'nama_prestasi', 'tingkat', 'tahun', 'keterangan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
