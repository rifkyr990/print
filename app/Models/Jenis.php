<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_jenis',
        'harga',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'jenis_id');
    }
}