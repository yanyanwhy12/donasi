<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi (Mass Assignment)
     */
    protected $fillable = [
        'order_id', 
        'bencana', 
        'nama_donatur', 
        'nominal', 
        'status', 
        'snap_token'
    ];

    /**
     * Default nilai untuk kolom tertentu
     */
    protected $attributes = [
        'status' => 'pending',
    ];

    /**
     * Casting tipe data
     * Ini memastikan 'nominal' selalu terbaca sebagai angka (integer) di Laravel
     */
    protected $casts = [
        'nominal' => 'integer',
    ];
}