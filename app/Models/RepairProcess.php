<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RepairProcess extends Model
{
    use HasFactory;


    protected $fillable = [
    'service_request_id', 'start_date', 'estimated_days', 'estimated_delivery_date'
    ];

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class);
    }
}
