<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPerintahTugas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function  generateNomorSurat()
    {
        $nomorSurat = 'SPT/' . date('Ymd') . '/' . sprintf('%04d', SuratPerintahTugas::count() + 1);

        return $nomorSurat;
    }

    public function nppd()
    {
        return $this->belongsTo(NotaPermintaanPerjalananDinas::class, 'nppd_id', 'id');
    }

    public function sppd()
    {
        return $this->hasMany(SuratPerintahPerjalananDinas::class, 'spt_id');
    }
}
