<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';
    protected $fillable = ['nama', 'jabatan', 'urutan', 'foto', 'komisariat_id', 'periode'];

    public function komisariat()
    {
        return $this->belongsTo(Komisariat::class, 'komisariat_id');
    }
}
