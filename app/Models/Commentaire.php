<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaire';

    // Champs qui peuvent être remplis via mass-assignment
    protected $fillable = [
        'username',
        'comment',
        'date',
        'idEvent',
    ];

    // Relation avec l'événement
    public function event()
    {
        return $this->belongsTo(Event::class, 'idEvent');
    }

    // Si tu veux gérer la date comme Carbon
    protected $dates = [
        'date',
    ];
}
