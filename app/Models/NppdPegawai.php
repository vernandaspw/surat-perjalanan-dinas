<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NppdPegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function data_pegawai()
    {
        return $this->belongsTo(DataPegawai::class, 'data_pegawai_id', 'id');
    }
    public function spt()
    {
        return $this->hasOne(SuratPerintahTugas::class);
    }

}
