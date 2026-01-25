<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_id',
        'name',
        'nik',
        'phone',
        'category',
        'subject',
        'description',
        'image',
        'is_anonymous',
        'status',
        'admin_response',
    ];
}
