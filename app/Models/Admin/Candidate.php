<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'city_id',
        'number',
        'acronym',
        'status',
        'elected',
        'image',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'bilhete_vereadores');
    }
    
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? 'ATIVO' : 'INATIVO',
        );
    }
}
