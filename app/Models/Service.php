<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    // Relación con ServiceRequest (un servicio puede estar en muchas solicitudes)
    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class);
    }
}
