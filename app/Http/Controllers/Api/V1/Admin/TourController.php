<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Http\Requests\ToursListRequest;
use App\Http\Resources\TourResource;
use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TourController extends Controller
{
    public function index(Travel $travel, ToursListRequest $request): AnonymousResourceCollection
    {
        return TourResource::collection($travel->tours()->filter($request)->orderBy('starting_date')->paginate());
    }

    public function store(Travel $travel, TourRequest $request): TourResource
    {
        $tour = $travel->tours()->create($request->validated());

        return new TourResource($tour);
    }

    public function show(Tour $tour): TourResource
    {
        return TourResource::make($tour);
    }

    public function update(Tour $tour, TourRequest $request): TourResource
    {
        $tour->update($request->validated());

        return new TourResource($tour);
    }

    public function destroy(Tour $tour): Response
    {
        $tour->delete();

        return response()->noContent(201);
    }
}
