<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Definisco la tabella types associata al modello
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Definisco la tabella technologies associata al modello
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
