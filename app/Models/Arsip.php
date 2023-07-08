<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $guarded = ['id'
    ];

    public function kantor()
    {
        return $this->belongsTo(Kantor::class, 'kantor_id', 'id');
    }

    public function bidang()
    {
        return $this->belongsTo(bidang::class, 'bidang_id', 'id');
    }
}
