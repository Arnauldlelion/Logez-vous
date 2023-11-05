<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Apartment extends Model
{
    use HasFactory;

    protected $casts = [
        'monthly_price' => 'float',
    ];


    protected $fillable = [
        'name',
        'floor',
        'furnished',
        'description',
        'monthly_price',
        'number_of_pieces',
        'size',
        'apt_type_id',
        'property_id',
    ];

    public function scopeFilter(Builder $query, array $filters = [])
    {
        $query
            ->when(request('keyword') ?? false, function ($query, $search) {
                $query->where('name', 'LIKE', '%' . Str::replace(' ', '%', $search) .  '%')
                    ->orWhere('description', 'LIKE', '%' . Str::replace(' ', '%', $search) .  '%');
            })
            ->when(request('min_price') ?? false, function ($query, $minPrice) {
                $query->where('monthly_price', '>=', $minPrice);
            })
            ->when(request('max_price') ?? false, function ($query, $maxPrice) {
                $query->where('monthly_price', '<=', $maxPrice);
            })
            ->when(request('min_surface_area') ?? false, function ($query, $minArea) {
                $query->where('size', '>=', $minArea);
            })
            ->when(request('max_surface_area') ?? false, function ($query, $maxArea) {
                $query->where('size', '<=', $maxArea);
            })
            ->when(request('furnished') ?? false, function ($query, $furnished) {
                $query->where('furnished', $furnished);
            })
            ->when(request('rooms') ?? false, function ($query, $rooms) {
                $query->whereIn('number_of_pieces', $rooms) // Search for apartments with number of romms corresponds to filter query
                    ->orWhereHas('apartmentType', function ($query) use ($rooms) { // Or seach all apartments with type having name that is in filter query
                        $query->whereIn('name', $rooms);
                    })
                    ->when(in_array('5+', $rooms), function ($query, $plus) { // Filter all apartments with more than 5 rooms
                        $query->where('number_of_pieces', '>=', 5);
                    });
            })
            ->when(request('amenity') ?? false, function ($query, $amenity) {
                $query->whereHas('property.amenity', function ($query) use ($amenity) {
                    $query->whereIn('name', $amenity);
                });
            })
            ->when(request('floor') ?? false, function ($query, $floor) {
                $query->whereHas('property.amenity', function ($query) use ($floor) {
                    $query->whereIn('name', $floor);
                });
            })
            ->when(request('apartment_status') ?? false, function ($query, $status) {
                $query->where('published', $status);
            })

            //
        ;
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function apartmentType()
    {
        return $this->belongsTo(ApartmentType::class, 'apt_type_id');
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function locataire()
    {
        return $this->hasOne(Locataire::class);
    }

    public function AnnualRapportDeGestions()
    {
        return $this->hasMany(AnnualRapport::class);
    }

    public function rapportDeGestions()
    {
        return $this->hasMany(RapportDeGestion::class);
    }

    public function pieces()
    {
        return $this->hasMany(Piece::class, 'apartment_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function coverImage()
    {
        return $this->hasOne(Image::class, 'imageable_id')->where('isCover', true);
    }
}
