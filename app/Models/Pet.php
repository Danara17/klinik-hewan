<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function myType()
    {
        return $this->belongsTo(MasterPetType::class, 'pet_type_id');
    }

    public function medicalRecord()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
