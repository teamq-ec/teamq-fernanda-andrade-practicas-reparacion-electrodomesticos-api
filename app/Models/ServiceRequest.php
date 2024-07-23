<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ServiceRequest extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'user_id', 'appliance_type', 'brand', 'problem_details', 'collection_address',
        'service_type', 'preferred_contact_method', 'damaged_appliance_image', 'state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function repairProcess()
    {
        return $this->hasOne(RepairProcess::class);
    }
}
