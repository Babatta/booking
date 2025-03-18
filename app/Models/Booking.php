<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Property;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'start_date',
        'end_date',
    ];

    // Relation avec le modèle User (un utilisateur peut avoir plusieurs réservations)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le modèle Property (une propriété peut avoir plusieurs réservations)
    public function property()
    {
        return $this->belongsTo(Property::class);
        
    }
    
}
