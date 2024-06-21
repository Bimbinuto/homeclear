<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_request_id', 
        'total_amount',
        'issue_date',
        'payment_status',
    ];

    // Relación:
    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class);
    }
}
