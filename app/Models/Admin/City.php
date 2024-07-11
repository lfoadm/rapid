<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'state',
        'status',
    ];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? 'ATIVO' : 'INATIVO',
        );
    }
}
