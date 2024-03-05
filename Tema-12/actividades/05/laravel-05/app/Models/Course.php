<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course',
        'ciclo',
    ];

    //Relación uno a muchos. JC "Un curso esta formado por varios estudiantes, el nombre del método va en plural y minúscula"
    public function students():HasMany
    {
        return $this->hasMany (Student::class);
    }
    
}
