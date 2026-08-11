<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappInquiry extends Model
{
    use HasFactory;

    protected $table = 'whatsapp_inquiries';

    protected $fillable = [
        'phone',
        'message',
    ];
}