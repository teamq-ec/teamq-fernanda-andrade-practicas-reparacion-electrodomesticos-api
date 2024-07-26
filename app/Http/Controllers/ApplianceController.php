<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

use App\Http\Resources\ServiceRequestCollection;
use App\Models\ServiceRequest;

class ApplianceController extends Controller
{
    public function getUserAppliances($userId)
    {
        $appliances = QueryBuilder::for(ServiceRequest::class)
            ->where('user_id', $userId)
            ->allowedFilters([
                AllowedFilter::partial('appliance_type'),
                AllowedFilter::partial('brand'),
                AllowedFilter::partial('problem_details'),
                AllowedFilter::partial('application_date'),
            ])
            ->paginate(5);
    
        return new ServiceRequestCollection($appliances);
    }
}
