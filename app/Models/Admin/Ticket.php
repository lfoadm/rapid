<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city_id',
        'purchase_value',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidates_ticket');
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? 'PAGO' : 'PENDENTE',
        );
    }
}
