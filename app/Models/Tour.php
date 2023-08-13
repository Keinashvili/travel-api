<?php

namespace App\Models;

use App\Http\Requests\ToursListRequest;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tour extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'tours';

    protected $fillable = [
        'travel_id',
        'name',
        'starting_date',
        'ending_date',
        'price',
    ];

    public function scopeFilter($query, ToursListRequest $request): void
    {
        $query->when($request->priceFrom, function ($query) use ($request) {
            $query->where('price', '>=', $request->priceFrom * 100);
        })->when($request->priceTo, function ($query) use ($request) {
            $query->where('price', '<=', $request->priceTo * 100);
        })->when($request->dateFrom, function ($query) use ($request) {
            $query->where('starting_date', '>=', $request->dateFrom);
        })->when($request->dateTo, function ($query) use ($request) {
            $query->where('starting_date', '<=', $request->dateTo);
        })->when($request->sortBy && $request->sortOrder, function ($query) use ($request) {
            $query->orderby($request->sortBy && $request->sortOrder);
        });
    }

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100,
            set: fn($value) => $value * 100
        );
    }
}
