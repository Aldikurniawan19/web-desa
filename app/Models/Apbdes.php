<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apbdes extends Model
{
    use HasFactory;
    protected $table = 'apbdes';

    protected $fillable = [
        'tahun',
        'pendapatan_dd',
        'pendapatan_add',
        'pendapatan_pades',
        'pendapatan_lain',
        'belanja_pemerintahan',
        'belanja_pembangunan',
        'belanja_kemasyarakatan',
        'belanja_pemberdayaan'
    ];

    public function getTotalPendapatanAttribute()
    {
        return $this->pendapatan_dd + $this->pendapatan_add + $this->pendapatan_pades + $this->pendapatan_lain;
    }

    public function getTotalBelanjaAttribute()
    {
        return $this->belanja_pemerintahan + $this->belanja_pembangunan + $this->belanja_kemasyarakatan + $this->belanja_pemberdayaan;
    }

    public function getSurplusDefisitAttribute()
    {
        return $this->total_pendapatan - $this->total_belanja;
    }
}
