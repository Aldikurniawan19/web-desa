<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'purpose',
        'status',
        'attachment',
        'admin_note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
