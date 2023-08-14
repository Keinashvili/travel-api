<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Http\Resources\Admin\TravelResource;
use App\Models\Travel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TravelController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TravelResource::collection(Travel::all());
    }

    public function store(TravelRequest $request): TravelResource
    {
        $travel = Travel::create($request->validated());

        return new TravelResource($travel);
    }

    public function show(Travel $travel): TravelResource
    {
        return TravelResource::make($travel);
    }

    public function update(Travel $travel, TravelRequest $request): TravelResource
    {
        $travel->update($request->validated());

        return new TravelResource($travel);
    }

    public function destroy(Travel $travel): Response
    {
        $travel->delete();

        return response()->noContent(201);
    }
}
