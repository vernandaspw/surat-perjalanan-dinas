<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPerintahPerjalananDinas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function  generateNomorSurat()
    {
        $nomorSurat = 'SPPD/' . date('Ymd') . '/' . sprintf('%04d', SuratPerintahTugas::count() + 1);

        return $nomorSurat;
    }


    public function pegawai()
    {
        return $this->belongsTo(DataPegawai::class, 'data_pegawai_id', 'id');
    }

    public function riwayat_biaya()
    {
        return $this->hasMany(RincianBiaya::class, 'sppd_id');
    }

    public function spt()
    {
        return $this->belongsTo(SuratPerintahTugas::class );
    }
}
