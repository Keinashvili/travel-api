<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TravelController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TravelResource::collection(Travel::query()->where('is_public', true)->paginate());
    }

    public function show(Travel $travel): TravelResource
    {
        return TravelResource::make($travel);
    }
}
