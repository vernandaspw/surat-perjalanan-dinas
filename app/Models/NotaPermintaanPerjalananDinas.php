<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaPermintaanPerjalananDinas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function nppd_pegawai()
    {
        return $this->hasMany(NppdPegawai::class, 'nppd_id');
    }

    public function spt()
    {
        return $this->hasOne(SuratPerintahTugas::class, 'nppd_id');
    }

   


}
