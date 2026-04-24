<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 
        'bencana', 
        'nama_donatur', 
        'nominal', 
        'status', 
        'snap_token'
    ];


    protected $attributes = [
        'status' => 'pending',
    ];


    protected $casts = [
        'nominal' => 'integer',
    ];
}