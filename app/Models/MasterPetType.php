<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPetType extends Model
{

    protected $fillable = [
        'name'
    ];

    use HasFactory;

    public function pet()
    {
        return $this->hasMany(Pet::class);
    }
}
