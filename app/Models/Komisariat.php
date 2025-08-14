<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komisariat extends Model
{
    use HasFactory;

    protected $table = 'komisariat';
    protected $fillable = ['nama','logo','deskripsi', 'alamat'];

    public function users()
    {
        return $this->hasMany(User::class, 'komisariat_id');
    }

    public function strukturOrganisasi()
    {
        return $this->hasMany(StrukturOrganisasi::class, 'komisariat_id');
    }
}
