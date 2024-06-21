<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email', 
    ];

    // Relación con ServiceRequest (un cliente puede tener muchas solicitudes)
    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class);
    }
}
