<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'city_id',
        'status',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? 'ATIVO' : 'INATIVO',
        );
    }
}
