<?php

namespace App\Models;

use App\Models\Jenis;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'file',
        'customer_id',
        'jenis_id',
        'status_id',
        'jumlah',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
